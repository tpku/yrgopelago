<?php

declare(strict_types=1);

require __DIR__ . "/vendor/autoload.php";

use benhall14\phpCalendar\Calendar as Calendar;

/* Declare Calendar 1 (Economy) */

$calendar1 = new Calendar();
$calendar1->useMondayStartingDate();
/* Declare Calendar 2 (Southern Standard) */
$calendar2 = new Calendar();
$calendar2->useMondayStartingDate();
/* Declare Calendar 3 (Heaven of Hans) */
$calendar3 = new Calendar();
$calendar3->useMondayStartingDate();


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


/* Check if room is vacant, add visual styling if not */
/* Fetch DB as PHP-value (arrays) */
// function notVacant($database, $calendar1 = null, $calendar2 = null, $calendar3 = null)
// {
//     $stmt = connect($database)->query(
//         "SELECT bookings.arrival_date, bookings.departure_date, bookings.room_id, rooms.name, rooms.price, rooms.type FROM bookings INNER JOIN rooms ON rooms.id = bookings.room_id;"
//     );

//     $stmt->execute();
//     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     if (!empty($result)) {
//         $validateMask = true;
//     }

//     foreach ($result as $event) {

//         /* add event to calendar1 (room_id = 1) if reservation class is 1 && eco */
//         if ($event["room_id"] === 1) {
//             $calendar1->addEvent($event["arrival_date"], $event["departure_date"], $event["name"], $validateMask, [$event["price"], $event["type"]]);
//         }
//         /* add event to calendar2 (room_id = 2) if reservation class is 2 && std */
//         if ($event["room_id"] === 2) {
//             $calendar2->addEvent($event["arrival_date"], $event["departure_date"], $event["name"], $validateMask, [$event["price"], $event["type"]]);
//         }
//         /* add event to calendar3 (room_id = 3) if reservation class is 3 && lux */
//         if ($event["room_id"] === 3) {
//             $calendar3->addEvent($event["arrival_date"], $event["departure_date"], $event["name"], $validateMask, [$event["price"], $event["type"]]);
//         }
//     }
// }


/* Fetch JSON-string from /bookings.json and convert to PHP-value (arrays) */
/* Check if room is vacant and add visual styling */

// $reservationJson = file_get_contents(__DIR__ . "/bookings.json");
// $checkReservations = json_decode($reservationJson, true);

// /* Loop through bookings and check for occupied rooms*/
// foreach ($checkReservations as $key => $event) {
//     /* add event to calendar1 (room_id = 1) if reservation class is 1 && eco */
//     if ($event["classes"][0] === 1 && $event["classes"][1] === "eco") {
//         $calendar1->addEvent($event["start"], $event["end"], $event["summary"], $event["mask"], $event["classes"][1]);
//     }
//     /* add event to calendar2 (room_id = 2) if reservation class is 2 && std */
//     if ($event["classes"][0] === 2 && $event["classes"][1] === "std") {
//         $calendar2->addEvent($event["start"], $event["end"], $event["summary"], $event["mask"], $event["classes"][1]);
//     }
//     /* add event to calendar3 (room_id = 3) if reservation class is 3 && lux */
//     if ($event["classes"][0] === 3 && $event["classes"][1] === "lux") {
//         $calendar3->addEvent($event["start"], $event["end"], $event["summary"], $event["mask"], $event["classes"][1]);
//     }
// }
