<?php

declare(strict_types=1);
require __DIR__ . "/vendor/autoload.php";

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
