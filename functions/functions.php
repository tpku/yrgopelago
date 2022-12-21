<?php

function checkAvailability(
    // string $inputName,
    // string $inputVoucher,
    string $inputArrival,
    string $inputDeparture,
    int $inputRoomType,
    $database
) {
    $stmt = connect($database)->query(
        "SELECT arrival_date, departure_date
        FROM bookings 
        WHERE ((:arrival_date <= arrival_date and departure_date >= :arrival_date) 
        OR (:departure_date <= arrival_date and departure_date >= :departure_date))
        AND (room_type == :room_type)"
    );

    $stmt->bindParam(':arrival_date', $inputArrival, PDO::PARAM_STR);
    $stmt->bindParam(':departure_date', $inputDeparture, PDO::PARAM_STR);
    $stmt->bindParam(':room_type', $inputRoomType, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
}
