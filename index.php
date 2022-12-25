<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";

// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\ClientException;

// $client = new Client();

// $response = $client->request(
//     'POST',
//     'https://www.yrgopelago.se/centralbank/transferCode',
//     [
//         'form_params' => [
//             'transferCode' => 'fa06e0b0-1751-43de-9b18-25c10df72e30',
//             'totalcost' => 20
//         ]
//     ]
// );

// if ($response->hasHeader('Content-Length')) {
//     $transfer_code = json_decode($response->getBody()->getContents());
//     var_dump($transfer_code);
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRGOPELAGO</title>
    <link rel="stylesheet" href="/css/global.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <header>
        <nav>
            <div class="info">
                <?php foreach (hotelInfo($database) as $test) : ?>
                    <p><?= $test["island"]; ?></p>
                    <p><?= $test["name"]; ?></p>
                    <p><?= $test["stars"]; ?></p>
                <?php endforeach; ?>
            </div>
            <ul>
                <li><a href="">ABOUT</a></li>
                <li><a href="">ROOMS</a></li>
                <li><a href="">FEATURES</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <section class="calendar-wrapper">
            <div class="calendar-container">
                <h2>Economy</h2>
                <?= $calendar->draw(date("2023-01-01"), "eco"); ?>
            </div>
            <div class="calendar-container">
                <h2>Southern Standard</h2>
                <?= $calendar->draw(date("2023-01-01"), "std"); ?>
            </div>
            <div class="calendar-container">
                <h2>Hans´s Heaven</h2>
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
        <p>
            <?php
            echo $printError;
            echo $printVerified;
            ?>
        </p>

    </main>
    <footer>

    </footer>
</body>

</html>