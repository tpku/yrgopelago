<?php

declare(strict_types=1);

require __DIR__ . "/vendor/autoload.php";

use benhall14\phpCalendar\Calendar as Calendar;

/* Declare Calendar 1 (Economy) */

$calendar1 = new Calendar();
$calendar1->useMondayStartingDate();

$calendar1->asMonthView();
/* Declare Calendar 2 (Southern Standard) */
$calendar2 = new Calendar();
$calendar2->useMondayStartingDate();
/* Declare Calendar 3 (Heaven of Hans) */
$calendar3 = new Calendar();
$calendar3->useMondayStartingDate();
$calendar3->asMonthView();


$calendars = [
    ["variable" => $calendar1, "number" => 1],
    ["variable" => $calendar2, "number" => 2],
    ["variable" => $calendar3, "number" => 3],
];

/* Check if room is vacant, add visual styling if not */
/* Fetch DB as PHP-value (arrays) */
function notVacant($database, array $calendars = null)
{
    $stmt = connect($database)->query(
        "SELECT bookings.arrival_date, bookings.departure_date, bookings.room_id, rooms.name, rooms.price, rooms.type FROM bookings INNER JOIN rooms ON rooms.id = bookings.room_id;"
    );

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $event) {
        foreach ($calendars as $calendar) {
            if ($event["room_id"] === $calendar["number"]) {
                $calendar["variable"]->addEvent($event["arrival_date"], $event["departure_date"], 0, 1, [$event["price"], $event["type"]]);
            }
        }
    }
}
