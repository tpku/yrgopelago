<?php
include __DIR__ . "/functions/functions.php";

$booking = "";
$events = array();


if (isset($_POST["name"], $_POST["voucher"], $_POST["arrival"], $_POST["departure"], $_POST["room_type"])) {
    $name = trim($_POST["name"]);
    $voucher = trim($_POST["voucher"]);
    $room = trim($_POST["room_type"]);
    $arrivalDate = trim($_POST["arrival"]);
    $departureDate = trim($_POST["departure"]);
    $booking = [
        "name" => $name,
        "voucher" => $voucher,
        "arrival_date" => $arrivalDate,
        "departure_date" => $departureDate,
        "room_type" => $room,
    ];

    // $booking = json_encode($booking); // make array > json

    // echo "<pre>";
    // print_r(checkAvailability($arrivalDate, $departureDate, $room, $database));
    // // print_r($booking);
    // echo "</pre>";

    /* Display selected date for form */
    $isAvailable = checkAvailability($arrivalDate, $departureDate, $room, $database);

    /* If guest selection is accepted and available do: */
    if (count($isAvailable) === 0) {
        /** Insert Into DATABASE  */
        $insertQuery =
            "INSERT INTO bookings (name, voucher, arrival_date, departure_date, room_type) VALUES (:name, :voucher, :arrival_date, :departure_date, :room_type)";

        $stmt = connect($database)->prepare($insertQuery);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':voucher', $voucher, PDO::PARAM_STR);
        $stmt->bindParam(':arrival_date', $arrivalDate, PDO::PARAM_STR);
        $stmt->bindParam(':departure_date', $departureDate, PDO::PARAM_STR);
        $stmt->bindParam(':room_type', $room, PDO::PARAM_INT);

        $stmt->execute();

        // Create array to use calendar function addEvents
        $events = [
            "start" => $arrivalDate,
            "end" => $departureDate,
            "name" => $name,
            "mask" => true,
            "classes" => ["booking", $arrivalDate, $departureDate], /* MODIFY CLASSES IF NEEDED */
        ];
        /** Select and Get JSON target file */
        $targetJson = file_get_contents(__DIR__ . "/bookings.json");
        /** Convert into array to use array_push with new data */
        $tempArray = json_decode($targetJson, true);
        /** Push the new booking data into existing json (temporary array) */
        array_push($tempArray, $events);

        print_r($tempArray);
        /** Print temp array. REMOVE */
        echo '<hr>';

        /** Convert back to JSON */
        $jsonData = json_encode($tempArray);
        /** Select and Put into JSON target file */
        file_put_contents(__DIR__ . "/bookings.json", $jsonData);

        print($jsonData);
        /** Print encoded array as JSON . REMOVE */


        // Print if reservation was available and successful 
        echo "GOOD STUFF! YIHA";

        // Test print $events and $bookingToJson
        echo "<pre>";
        print_r($events);
        // print_r($bookingToJson);
        echo "</pre>";
    } else {
        echo "TRY AGAIN!";
    };
}
