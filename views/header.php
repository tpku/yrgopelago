<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YRGOPELAGO</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/rooms.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/start.css">
</head>

<body>
    <header>
        <nav>
            <div class="info">
                <?php foreach (hotelInfo($database) as $hotel) : ?>
                    <p><a href="index.php"><?= $hotel["name"] . " "; ?>
                            <?php for ($i = 0; $i < $hotel["stars"]; $i++) {
                                echo "☆ ";
                            } ?></a></p>
                    <p><?= "Enjoy the great wonders of " . $hotel["island"]; ?>

                    <?php endforeach; ?>
            </div>
            <ul>
                <li><a href="index.php">START</a></li>
                <li><a href="rooms.php">ROOMS</a></li>
                <li><a href="features.php">FEATURES</a></li>
                <li><a href="room.php">ROOM INFO</a></li>
            </ul>
        </nav>
    </header>
    <div class="bg">
        <img src="img/bgtest.jpg" alt="">
    </div>