<?php
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";


// Connect Database
// $stmt = $database connection -> connection = query SELECT * (ALL) FROM booking (table_name)
// _-------------------------------------------------
// $stmt = connect($database)->prepare("SELECT room_type FROM bookings WHERE arrival_date = '2023-01-01'");

// $stmt = execute (run)
// _-------------------------------------------------
// $stmt->execute();

// TEST PRINT with print_r to se if DB is connected. Result should show database data. 1 array per row.
// _-------------------------------------------------
// echo "<pre>";
// print_r($testData);
// echo "</pre>";

// Define $stmt > $testData as associative array
// _-------------------------------------------------
// $testData = $stmt->fetchAll(PDO::FETCH_ASSOC); // Define testdata as check

// Convert to json
// $testData = json_encode($testData);




// function checkAvailability(
//     string $inputName,
//     string $inputVoucher,
//     string $inputArrival,
//     string $inputDeparture,
//     int $inputRoomType,
//     int $dbRoomTYpe
// ) {
//     if (condition) {
//         $insertQuery = "INSERT INTO bookings (name, voucher, arrival_date, departure_date, room_type) VALUES (:name, :voucher, :arrival_date, :departure_date, :room_type)";

//     $stmt = connect($database)->prepare($insertQuery);
//     $stmt->bindParam(':name', $name, PDO::PARAM_STR);
//     $stmt->bindParam(':voucher', $voucher, PDO::PARAM_STR);
//     $stmt->bindParam(':arrival_date', $arrivalDate, PDO::PARAM_STR);
//     $stmt->bindParam(':departure_date', $departureDate, PDO::PARAM_STR);
//     $stmt->bindParam(':room_type', $room, PDO::PARAM_INT);

//     $stmt->execute();
//     }
// }


// function checkAvailability(
//     string $inputName,
//     string $inputVoucher,
//     string $inputArrival,
//     string $inputDeparture,
//     int $inputRoomType,
//     int $dbRoomType,
// ) {
//     if (condition) {
//         $insertQuery = "INSERT INTO bookings (name, voucher, arrival_date, departure_date, room_type) VALUES (:name, :voucher, :arrival_date, :departure_date, :room_type)";

//         $stmt = connect($database)->prepare($insertQuery);
//         $stmt->bindParam(':name', $inputName, PDO::PARAM_STR);
//         $stmt->bindParam(':voucher', $inputVoucher, PDO::PARAM_STR);
//         $stmt->bindParam(':arrival_date', $inputArrival, PDO::PARAM_STR);
//         $stmt->bindParam(':departure_date', $inputDeparture, PDO::PARAM_STR);
//         $stmt->bindParam(':room_type', $inputRoomType, PDO::PARAM_INT);

//         $stmt->execute();
//     }

// }

// print_r(checkAvailability("2023-01-01", "2023-01-01", 2, 3, "testRoom"));




// if (dateExist($arrivalDate, $testData["arrival_date"])) {
//     echo "Tjena";
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRGOPELAGO</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <section class="calendar-wrapper">
        <div class="calendar-container">
            <h2>Economy</h2>
            <?= $calendar->draw(date("2023-01-01"), "eco"); ?>
        </div>
        <div class="calendar-container">
            <h2>Southern Date</h2>
            <?= $calendar->draw(date("2023-01-01"), "std"); ?>
        </div>
        <div class="calendar-container">
            <h2>Hans Heaven</h2>
            <?= $calendar->draw(date("2023-01-01"), "lux"); ?>
        </div>
    </section>

    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="" name="voucher" placeholder="Voucher">
        <input type="date" name="arrival" class="form-input" min="2023-01-01" max="2023-01-31">
        <input type="date" name="departure" class="form-input" min="2023-01-01" max="2023-01-31">
        <select name="room_type" id="rooms">
            <option value="1">Economy</option>
            <option value="2">Southern Standard</option>
            <option value="3">Hans Heaven</option>
        </select>
        <!-- <select name="features" id="features">
            <option value="sauna">Sauna</option>
            <option value="kettlebell">Kettlebell Workout</option>
            <option value="beerTasting">Beer Tasting from o/o</option>
        </select> -->

        <input class="submit" type="submit" value="Send data">
    </form>
</body>

</html>