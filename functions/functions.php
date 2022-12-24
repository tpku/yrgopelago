<?php

declare(strict_types=1);

/** Check availability on selected dates and room */
function checkAvailability(
    string $inputArrival,
    string $inputDeparture,
    string $inputRoomType,
    $database
) {
    $stmt = connect($database)->query(
        "SELECT arrival_date, departure_date, room_type 
        FROM bookings 
        WHERE room_type = :room_type AND (arrival_date <= :arrival_date or arrival_date < :departure_date) AND (departure_date > :arrival_date or departure_date > :departure_date);"
    );

    $stmt->bindParam(':arrival_date', $inputArrival, PDO::PARAM_STR);
    $stmt->bindParam(':departure_date', $inputDeparture, PDO::PARAM_STR);
    $stmt->bindParam(':room_type', $inputRoomType, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function hotelInfo($database)
{
    $stmt = connect($database)->query("SELECT * FROM hotel_info;");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $result = json_encode($result);

    return $result;
}
