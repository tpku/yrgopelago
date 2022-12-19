<?php

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

}

echo "<pre>";
print_r($booking);
echo "</pre>";
