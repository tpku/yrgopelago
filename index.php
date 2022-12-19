<?php
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/form.php";
include __DIR__ . "/hotelFunctions.php";




$stmt = connect($database)->prepare('SELECT * FROM bookings');

$stmt->execute();

$testData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Convert to json
$testData = json_encode($testData);

echo "<pre>";
print_r($testData);
echo "</pre>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRGOPELAGO</title>
</head>

<body>
    <?= $calendar->draw(date("2023-01-01")); ?>

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