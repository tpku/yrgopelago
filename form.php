<?php
include __DIR__ . "/functions/functions.php";

$booking = "";


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

    $booking = json_encode($booking); // make array > json

    echo "<pre>";
    var_dump(checkAvailability($arrivalDate, $departureDate, $room, $database));
    // print_r($booking);
    echo "</pre>";

    $isAvailable = checkAvailability($arrivalDate, $departureDate, $room, $database);

    if (count($isAvailable) === 0) {

        // $insertQuery = "INSERT INTO bookings (name, voucher, arrival_date, departure_date, room_type) VALUES (:name, :voucher, :arrival_date, :departure_date, :room_type)";

        // $stmt = connect($database)->prepare($insertQuery);
        // $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        // $stmt->bindParam(':voucher', $voucher, PDO::PARAM_STR);
        // $stmt->bindParam(':arrival_date', $arrivalDate, PDO::PARAM_STR);
        // $stmt->bindParam(':departure_date', $departureDate, PDO::PARAM_STR);
        // $stmt->bindParam(':room_type', $room, PDO::PARAM_INT);

        // $stmt->execute();


        echo "GOOD STUFF! YIHA";
    } else {
        echo "TRY AGAIN!";
    }
}
