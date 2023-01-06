<?php

declare(strict_types=1);
session_start();
include __DIR__ . "/functions/functions.php";
include __DIR__ . "/voucher.php";
include __DIR__ . "/roomPrice.php";
include __DIR__ . "/featurePrice.php";


unset($errors);

$bookings = array();
$errors = [];
$msgs = [];
$featurePrices = [];

/* Declare hotel info from DB > hotel_info */
$hotelName = hotelInfo($database)[0]["name"];
$hotelIsland = hotelInfo($database)[0]["island"];
$hotelStars = hotelInfo($database)[0]["stars"];

/* Check if rooms are vacant Function inside "/calendar.php" */
notVacant($database, $calendars);


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

    /* Declare & add feature IDs to array if set */
    if (isset($_POST["feature-1"])) {
        $featureSelected[] = $_POST["feature-1"];
    }
    if (isset($_POST["feature-2"])) {
        $featureSelected[] = $_POST["feature-2"];
    }
    if (isset($_POST["feature-3"])) {
        $featureSelected[] = $_POST["feature-3"];
    }

    /* Fetch price and add price to array */
    foreach ($featureSelected as $feature) {
        $featurePrices[] = getFeaturePrice($database, $feature);
    }

    /* Calculate total cost for features */
    $featureCost = 0;
    foreach ($featurePrices as $i) {
        $featureCost += $i;
    }

    /* ---- Fetch Room Price ---- from db checking room nr & calculating price * nights */
    /* Function accepts: 1 database, 2 room id, 3 arrival date, 4 departure date */
    $roomCost = calcTotalCost($database, $room, $arrivalDate, $departureDate);

    /* Calculate Total Cost */
    $totalCost = $roomCost + $featureCost;

    /* Discount */
    if ($totalCost >= 35) {
        $totalCost = $totalCost - 5;
    }

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

            /* Insert Into DATABASE: bookings table */
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

            /* Fetch & insert into DATABASE: booking_room table */
            $bookingRoomQuery =
                "INSERT INTO booking_room (booking_id, room_id)
                SELECT id, room_id FROM bookings ORDER BY id DESC LIMIT 1;";

            $stmt = connect($database)->prepare($bookingRoomQuery);
            $stmt->execute();

            // ---- | FIX | ---- //
            /* Fetch & insert into DATABASE: booking_feature table */
            // $bookingFeatureQuery =
            //     "INSERT INTO booking_feature (booking_id, feature_id)
            //     SELECT id, :feature_id FROM bookings ORDER BY id DESC LIMIT 1;";

            // $stmt = connect($database)->prepare($bookingFeatureQuery);
            // $stmt->bindParam(':feature_id', $featureId, PDO::PARAM_INT);
            // $stmt->execute();

            /* Declare Receipt Array*/
            $bookings = [
                "island" => $hotelIsland,
                "hotel" => $hotelName,
                "arrival_date" => $arrivalDate,
                "departure_date" => $departureDate,
                "total_cost" => $totalCost,
                "stars" => $hotelStars,
                "features" => ["toBeAdded"],
                "additional_info" => ["Thank you for choosing " . $hotelIsland . "."],
            ];


            /* Select and Get JSON target file */
            $targetJson = file_get_contents(__DIR__ . "/bookings.json");
            /* Convert into array to use array_push with new data */
            $tempArray = json_decode($targetJson, true);
            /* Push the new booking data into existing json (temporary array) */
            array_push($tempArray, $bookings);

            $successfulBooking = json_encode(end($tempArray));

            /* Convert back to JSON */
            $jsonData = json_encode($tempArray, JSON_PRETTY_PRINT);
            /* Select and Put into JSON target file */
            file_put_contents(__DIR__ . "/bookings.json", $jsonData);

            /* Print if all good */
            $msgs[] = "Payment approved, your reservation has been received. Welcome to " . $hotelName . "!";
            /* Clear $errors if booking was successful and payment approved */
            unset($errors);


            /* Test print $bookings and $bookingToJson */
            echo "<pre>";
            // print_r($bookings);
            // print_r($_SESSION);
            /* print_r($bookingToJson); */
            echo "</pre>";
            header("Location: receipt.php");
        } else {
            $errors[] = "Selected room is not available on given date. Please try again.";
            // print_r($errors);
        };
    } else {
        $errors[] = "Invalid information given. Please try again.";
    };
};
