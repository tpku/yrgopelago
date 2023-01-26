<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";
require __DIR__ . "/views/header.php";

?>

<main>
    <section class="room-info-container">
        <?php
        // querystring for the header:
        //?room=std&arrivaldate=2023-01-01&departuredate=2023-01-02

        if (isset($_GET['room'])) {
            $room_id = htmlspecialchars($_GET['room'], ENT_QUOTES); ?>

            <h1 class="heading card">Bookings</h1>
            <section class="room-info-cards">
                <div class="room-info-card">
                    <?php
                    if ($_GET['room'] === "eco") {
                        $room_id = 1; ?>
                        <article class="room card" id="card-eco" style="height: 380px;">
                            <div class="img-container">
                                <span class="price">$<?= fetchRoomNameCost($database)[0]["price"]; ?></span>
                                <img class="room-img" src="https://images.unsplash.com/photo-1619207265576-787cc49b2784?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
                            </div>
                            <h2 class="room-name"><?= fetchRoomNameCost($database)[0]["name"]; ?></h2>
                            <p class="room-info">$<?= fetchRoomNameCost($database)[0]["price"]; ?> / Night</p>
                            <p class="room-info">Our most affordable room. Also our smallest room available. However, when you have the great views of Southern Isles just outside the door you won't need more than a simple bed.</p>
                        </article>
                    <?php
                    } elseif ($_GET['room'] === "std") {
                        $room_id = 2; ?>
                        <article class="room card" id="card-std" style="height: 380px;">
                            <div class="img-container">
                                <span class="price">$<?= fetchRoomNameCost($database)[1]["price"]; ?></span>
                                <img class="room-img" src="https://images.unsplash.com/photo-1601026375090-b77cb4c80fd5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80" alt="">
                            </div>
                            <h2 class="room-name"><?= fetchRoomNameCost($database)[1]["name"]; ?></h2>
                            <p class="room-info">$<?= fetchRoomNameCost($database)[1]["price"]; ?> / Night</p>
                            <p class="room-info">Comfort with a budget. This is our standard room. Inspired by the locals who have strolled the plains of the Southern for decades.</p>
                        </article>
                    <?php
                    } elseif ($_GET['room'] === "lux") {
                        $room_id = 3; ?>
                        <article class="room card" id="card-lux" style="height: 380px;">
                            <div class="img-container">
                                <span class="price">$<?= fetchRoomNameCost($database)[2]["price"]; ?></span>
                                <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
                            </div>
                            <h2 class="room-name"><?= fetchRoomNameCost($database)[2]["name"]; ?></h2>
                            <p class="room-info">$<?= fetchRoomNameCost($database)[2]["price"]; ?> / Night</p>
                            <p class="room-info">Our finest suite. Not called Heaven for no reason. Hans's home deserves a suite in its honor. A heavenly experience in comparison to the origins of Hans’s home from the movie “Frozen”.</p>
                        </article>
                    <?php
                    } else {
                        $room_id = 0;
                    } ?>
                </div>

                <?php
                if ($room_id === 0) {
                ?>
                    <div>
                        <span class="error-message">
                            <h2>Please make sure the room name is correct: eco, std or lux</h2>
                        </span>
                    </div>
                <?php
                }
                ?>

                <?php
                if ($room_id > 0) { ?>
                    <div class="info-calendar">
                        <div class="calendar">
                            <?php
                            if ($room_id === 1) { ?>
                                <section class="calendar-wrapper">
                                    <div class="calendar-container">
                                        <?= $calendar1->draw(date("2023-01-01"), "eco"); ?>
                                    </div>
                                </section>
                            <?php
                            } elseif ($room_id === 2) { ?>
                                <section class="calendar-wrapper">
                                    <div class="calendar-container">
                                        <?= $calendar2->draw(date("2023-01-01"), "eco"); ?>
                                    </div>
                                </section>
                            <?php
                            } elseif ($room_id === 3) { ?>
                                <section class="calendar-wrapper">
                                    <div class="calendar-container">
                                        <?= $calendar3->draw(date("2023-01-01"), "eco"); ?>
                                    </div>
                                </section>
                            <?php
                            } ?>
                        </div>
                        <div class="text">
                            <?php
                            if (isset($_GET['arrivaldate'], $_GET['departuredate']) && $room_id > 0) {

                                $arrival_date = htmlspecialchars($_GET['arrivaldate'], ENT_QUOTES);
                                $departure_date = htmlspecialchars($_GET['departuredate'], ENT_QUOTES);


                                if (
                                    preg_match("/^[0-9]{4}.(0[1-9]|1[1-2]).(0[1-9]|1[0-9]|2[0-9]|3[0-1])$/", $arrival_date) &&
                                    preg_match("/^[0-9]{4}.(0[1-9]|1[1-2]).(0[1-9]|1[0-9]|2[0-9]|3[0-1])$/", $departure_date)
                                ) {
                                    connect($database);

                                    $status = checkAvailability($arrival_date, $departure_date, $room_id, $database);

                                    if (count($status) === 0) {
                                        $status_message = "The room is not booked\nbetween: " . $arrival_date . "\nand: " . $departure_date;
                                    } else {
                                        $status_message = "The room is booked\nbetween: " . $arrival_date . "\nand: " . $departure_date;
                                    } ?>
                                    <span class="error-message" style="display: flex; justify-content:center; align-items:center; margin-top:25px;">
                                        <h2><?= nl2br($status_message) ?></h2>
                                    </span>
                                <?php
                                } else {
                                ?>
                                    <span class="error-message" style="display: flex; justify-content:center; align-items:center; margin-top:25px;">
                                        <h2>The date format in the query is not correct please use this format: YYYY-MM-DD</h2>
                                    </span>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php
                } ?>
            </section>
        <?php
        } else {
        ?>
            <span class="error-message">
                <h2>Please add a query in the header like the example bellow</h2>
                <p>?room=roomName&arrivaldate=YYYY-MM-DD&departuredate=YYYY-MM-DD</p>
            </span>
        <?php
        } ?>
    </section>
</main>

<?php require __DIR__ . "/views/footer.php"; ?>