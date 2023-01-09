<?php

declare(strict_types=1);
require __DIR__ . "/vendor/autoload.php";

/* Only require hotelFunctions when directly working form file (roomPrice.php) */
// require __DIR__ . "/hotelFunctions.php";

/* Dummy data to control function. Supposed to come from input form. */
// $db = "/database/database.db";
// $arrival = "2023-01-01";
// $departure = "2023-01-03";
// $room = 2;

function calcTotalCost($database, $inputRoom, $arrival, $departure): int
{
    /* Fetch room price from DB where rooms.id = input room id */
    $stmt = connect($database)->query(
        "SELECT price FROM rooms WHERE id = :room_id;"
    );

    $stmt->bindParam(':room_id', $inputRoom, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    /* Target price value from room array */
    $price = $result["price"];

    /* Calculate total cost */
    $totalCost = (((strtotime($departure) - strtotime($arrival)) / 86400) * $price);

    /* Return integer */
    return $totalCost;
}

// /* Function accepts: db-url, room-nr, arrival-date, departure-date */
// /* Fetch room price from db checking room nr. Calculating price * nights */
// $totalCost = calcTotalCost($db, $room, $arrival, $departure);
