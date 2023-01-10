<?php

declare(strict_types=1);

/** Check availability on selected dates and room */
function checkAvailability(
    string $inputArrival,
    string $inputDeparture,
    string $inputRoomId,
    $database
) {
    $stmt = connect($database)->query(
        "SELECT arrival_date, departure_date, room_id 
        FROM bookings 
        WHERE room_id = :room_id AND (arrival_date <= :arrival_date or arrival_date < :departure_date) AND (departure_date > :arrival_date or departure_date > :departure_date);"
    );

    $stmt->bindParam(':arrival_date', $inputArrival, PDO::PARAM_STR);
    $stmt->bindParam(':departure_date', $inputDeparture, PDO::PARAM_STR);
    $stmt->bindParam(':room_id', $inputRoomId, PDO::PARAM_INT);

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/* Fetch hotel info from database */
function hotelInfo($database)
{
    $stmt = connect($database)->query("SELECT * FROM hotel_info;");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // $result = json_encode($result);

    return $result;
}


function checkRoomId(int $roomId): string
{
    if ($roomId === 1) {
        $roomName = "eco";
    }
    if ($roomId === 2) {
        $roomName = "std";
    }
    if ($roomId === 3) {
        $roomName = "lux";
    }
    return $roomName;
}

function checkRoomPage($script, $id)
{
    if ($script === $id) {
        $room = 1;
        echo $room;
    }
};


function fetchRoomNameCost($database): array
{
    $stmt = connect($database)->query("SELECT name, price FROM rooms;");

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}
