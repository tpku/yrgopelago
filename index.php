<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";
require __DIR__ . "/views/header.php";

// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

?>

<main>

    <section class="calendar-wrapper">
        <div class="calendar-container">
            <h2>Economy</h2>
            <?= $calendar1->draw(date("2023-01-01"), "eco"); ?>
        </div>
        <div class="calendar-container">
            <h2>Southern Standard</h2>
            <?= $calendar2->draw(date("2023-01-01"), "std"); ?>
        </div>
        <div class="calendar-container">
            <h2>Heaven of Hans</h2>
            <?= $calendar3->draw(date("2023-01-01"), "lux"); ?>
        </div>
    </section>

    <form action="index.php" method="post">
        <input type="text" name="name" placeholder="Name">
        <input type="" name="voucher" placeholder="Voucher">
        <input type="date" name="arrival" class="form-input" min="2023-01-01" max="2023-01-31">
        <input type="date" name="departure" class="form-input" min="2023-01-01" max="2023-01-31">
        <select name="room_id" id="rooms">
            <option value="1">Economy</option>
            <option value="2">Southern Standard</option>
            <option value="3">Heaven of Hans</option>
        </select>
        <!-- <select name="features" id="features">
            <option value="1">Sauna</option>
            <option value="2">Kettlebell Workout</option>
            <option value="3">Beer Tasting from o/o</option>
        </select> -->

        <input class="submit" type="submit" value="Send data">
    </form>
    <p class="booking-response">
        <?php if (isset($successfulBooking)) {
            echo "<pre>";
            print_r(end($successfulBooking));
            echo "</pre>";
        } ?>
    </p>
    <p>
        <?php if (isset($errors)) : ?>
            <?php foreach ($errors as $error) : ?>
                <?= $error; ?>
            <?php endforeach; ?>
        <?php endif ?>
        <?php foreach ($msgs as $msg) : ?>
            <?= $msg; ?>
        <?php endforeach; ?>
    </p>

</main>
<?php require __DIR__ . "/views/footer.php"; ?>