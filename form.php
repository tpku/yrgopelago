<?php

declare(strict_types=1);
session_start();
include __DIR__ . "/functions/functions.php";
include __DIR__ . "/voucher.php";
include __DIR__ . "/roomPrice.php";


unset($errors);

$bookings = array();
$errors = [];
$msgs = [];

/* Declare hotel info from DB > hotel_info */
$hotelName = hotelInfo($database)[0]["name"];
$hotelIsland = hotelInfo($database)[0]["island"];
$hotelStars = hotelInfo($database)[0]["stars"];

/* Check if rooms are vacant Function inside "/calendar.php" */
notVacant($database, $calendar1, $calendar2, $calendar3);

if (isset($_POST["name"], $_POST["voucher"], $_POST["arrival"], $_POST["departure"], $_POST["room_id"])) {

    /* ---- Name ---- */
    if (!empty($_POST["name"])) {
        $name = trim($_POST["name"]);
    } else {
        $errors[] = "Name is not given";
    }

    /* ---- Arrival date ---- */
    if (!empty(trim($_POST["arrival"]))) {
        $arrivalDate = trim($_POST["arrival"]);
    } else {
        $errors[] = "Arrival date is not selected.";
    }

    /* ---- Departure date ---- */
    if (!empty(trim($_POST["departure"]))) {
        $departureDate = trim($_POST["departure"]);
        if ($arrivalDate < $departureDate) {
            $checkDate = true;
            // echo "check date is true";
        } else {
            $checkDate = false;
            $errors[] = "Check out date have to be after Check in.";
            // echo "check date is false";
        }
    } else {
        $errors[] = "Departure date is not selected.";
    }

    /* ---- Room ID ---- */
    $room = trim($_POST["room_id"]);

    /* Fetch room price from db checking room nr. Calculating price * nights */
    /* Function accepts: 1 database, 2 room id, 3 arrival date, 4 departure date */
    $totalCost = calcTotalCost($database, $room, $arrivalDate, $departureDate);

    /* ---- Voucher (Uuid / Transfer code) ---- */
    if (isValidUuid($_POST["voucher"]) === true) {
        $voucher = trim($_POST["voucher"]);
        $isVoucherValid = validateTransferCode($voucher, $totalCost); // change $transferCode to $voucher (or input value for transfer code/voucher)
        if ($isVoucherValid === true) {
            $paymentApproved = true;
            // $msgs[] = "Thank you for your payment.";
            // echo "Transfer code is valid";
            // echo $voucher;
        } else {
            $paymentApproved = false;
            $errors[] = "Transfer code is not valid, please try again.";
        }
    } else {
        $voucher = trim($_POST["voucher"]);
        $errors[] = "Payment is not a valid uuid!";
    }

    /* If errors is empty and arrival < departure */
    if (!$errors && $checkDate === true) {
        $isAvailable = checkAvailability($arrivalDate, $departureDate, $room, $database);

        /* If room is vacant and payment is approved */
        if (count($isAvailable) === 0 && $paymentApproved === true) {

            /* Insert Into DATABASE  */
            $insertQuery =
                "INSERT INTO bookings (name, voucher, arrival_date, departure_date, room_id, total_cost) VALUES (:name, :voucher, :arrival_date, :departure_date, :room_id, :total_cost)";

            $stmt = connect($database)->prepare($insertQuery);
            $stmt->bindParam(':name', $name, PDO::PARAM_STR);
            $stmt->bindParam(':voucher', $voucher, PDO::PARAM_STR);
            $stmt->bindParam(':arrival_date', $arrivalDate, PDO::PARAM_STR);
            $stmt->bindParam(':departure_date', $departureDate, PDO::PARAM_STR);
            $stmt->bindParam(':room_id', $room, PDO::PARAM_INT);
            $stmt->bindParam(':total_cost', $totalCost, PDO::PARAM_INT);

            $stmt->execute();

            /* Redeclare $room as int ($room) */
            $room = (int) $room;
            /* Declare function result as $roomName */
            $roomName = checkRoomId($room);

            /* Create array to use calendar function addEvents */
            // $bookings = [
            //     "start" => $arrivalDate,
            //     "end" => $departureDate,
            //     "summary" => "reservation by " . $name,
            //     "mask" => true,
            //     "classes" => [$room, $roomName], /* MODIFY CLASSES IF NEEDED */
            // ];

            $bookings = [
                "island" => $hotelIsland,
                "hotel" => $hotelName,
                "arrival_date" => $arrivalDate,
                "departure_date" => $departureDate,
                "total_cost" => $totalCost,
                "stars" => $hotelStars,
                "features" => ["toBeAdded"],
                "additional_info" => "Thank you for choosing " . $hotelIsland . ".",
            ];


            /* Select and Get JSON target file */
            $targetJson = file_get_contents(__DIR__ . "/bookings.json");
            /* Convert into array to use array_push with new data */
            $tempArray = json_decode($targetJson, true);
            /* Push the new booking data into existing json (temporary array) */
            array_push($tempArray, $bookings);

            print_r($tempArray);
            /* Print temp array. REMOVE */
            echo '<hr>';


            /* Convert back to JSON */
            $jsonData = json_encode($tempArray);
            /* Select and Put into JSON target file */
            file_put_contents(__DIR__ . "/bookings.json", $jsonData);

            /* Print encoded array as JSON . REMOVE */
            print($jsonData);

            $msgs[] = "Thank you for your payment.";
            $msgs[] = "Your booking has been received. Welcome to " . $hotelName . "!";
            /* Clear $errors if booking was successful and payment approved */
            unset($errors);


            /* Test print $bookings and $bookingToJson */
            echo "<pre>";
            print_r($bookings);
            print_r($_SESSION);
            /* print_r($bookingToJson); */
            echo "</pre>";
        } else {
            $errors[] = "Selected room is not available on given date. Please try again.";
            // print_r($errors);
        };
    } else {
        $errors[] = "Invalid information given. Please try again.";
    };
};
