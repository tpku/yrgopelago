<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";
require __DIR__ . "/views/header.php";
?>

<main>
    <section class="rooms">
        <h1 class="heading card">ROOMS</h1>
        <div class="article-wrapper">
            <article class="room card" id="card-eco">
                <div class="img-container">
                    <span class="price">$<?= fetchRoomNameCost($database)[0]["price"]; ?></span>
                    <img class="room-img" src="https://images.unsplash.com/photo-1619207265576-787cc49b2784?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
                </div>
                <h2 class="room-name"><?= fetchRoomNameCost($database)[0]["name"]; ?></h2>
                <p class="room-info">$<?= fetchRoomNameCost($database)[0]["price"]; ?> / Night</p>
                <p class="room-info">Our most affordable room. Also our smallest room available. However, when you have the great views of Southern Isles just outside the door you won't need more than a simple bed.</p>
                <a class="room-booking" href="#room-1">
                    <h2>CHECK AVAILABILITY ></h2>
                </a>
            </article>

            <article class="room card" id="card-std">
                <div class="img-container">
                    <span class="price">$<?= fetchRoomNameCost($database)[1]["price"]; ?></span>
                    <img class="room-img" src="https://images.unsplash.com/photo-1601026375090-b77cb4c80fd5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80" alt="">
                </div>
                <h2 class="room-name"><?= fetchRoomNameCost($database)[1]["name"]; ?></h2>
                <p class="room-info">$<?= fetchRoomNameCost($database)[1]["price"]; ?> / Night</p>
                <p class="room-info">Comfort with a budget. This is our standard room. Inspired by the locals who have strolled the plains of the Southern for decades.</p>
                <a class="room-booking" href="#room-2">
                    <h2>CHECK AVAILABILITY ></h2>
                </a>
            </article>

            <article class="room card" id="card-lux">
                <div class="img-container">
                    <span class="price">$<?= fetchRoomNameCost($database)[2]["price"]; ?></span>
                    <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
                </div>
                <h2 class="room-name"><?= fetchRoomNameCost($database)[2]["name"]; ?></h2>
                <p class="room-info">$<?= fetchRoomNameCost($database)[2]["price"]; ?> / Night</p>
                <p class="room-info">Our finest suite. Not called Heaven for no reason. Hans's home deserves a suite in its honor. A heavenly experience in comparison to the origins of Hans’s home from the movie “Frozen”.</p>
                <a class="room-booking" href="#room-3">
                    <h2>CHECK AVAILABILITY ></h2>
                </a>
            </article>
        </div>
        <!-- | Print Messages | -->
        <p>
            <?php if (isset($errors)) : ?>
                <?php foreach ($errors as $error) : ?>
        <p class="errors"><?= $error; ?></p>
    <?php endforeach; ?>
<?php endif ?>
</p>
    </section>

    <section id="room-1">
        <h1><?= fetchRoomNameCost($database)[0]["name"]; ?> <span class="rooms-title">$<?= fetchRoomNameCost($database)[0]["price"]; ?> / Night</span></h1>
        <div class="left-container">
            <section class="calendar-wrapper">
                <div class="calendar-container">
                    <?= $calendar1->draw(date("2023-01-01"), "eco"); ?>
                </div>
            </section>
            <form action="rooms.php" method="post">
                <input type="text" name="name" placeholder="Name" required>
                <input type="" name="voucher" placeholder="Api-key" required>
                <input type="date" name="arrival" class="form-input" min="2023-01-01" max="2023-01-31" required>
                <input type="date" name="departure" class="form-input" min="2023-01-01" max="2023-01-31" required>
                <select name="room_id" id="rooms">
                    <option value="1">Economy</option>
                </select>
                <div class="radio-wrapper">
                    <h3>Features</h3>
                    <div class="radio-selection">
                        <label for="dewey">Arctic Sauna $2</label>
                        <input type="checkbox" id="sauna" name="feature-1" value="1">
                    </div>
                    <div class="radio-selection">
                        <label for="dewey">Kettlebell Workout $3</label>
                        <input type="checkbox" id="workout" name="feature-2" value="2">
                    </div>
                    <div class="radio-selection">
                        <label for="dewey">Beer Tasting w. Manager $5</label>
                        <input type="checkbox" id="beer" name="feature-3" value="3">
                    </div>
                </div>

                <input class="submit" type="submit" value="Confirm Reservation">
            </form>
        </div>
        <div class="right-container">
            <img src="https://images.unsplash.com/photo-1619207265576-787cc49b2784?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
        </div>
    </section>

    <section id="room-2">
        <h1><?= fetchRoomNameCost($database)[1]["name"]; ?> <span class="rooms-title">$<?= fetchRoomNameCost($database)[1]["price"]; ?> / Night</span></h1>
        <div class="left-container">
            <section class="calendar-wrapper">
                <div class="calendar-container">
                    <?= $calendar2->draw(date("2023-01-01"), "eco"); ?>
                </div>
            </section>
            <form action="rooms.php" method="post">
                <input type="text" name="name" placeholder="Name" required>
                <input type="" name="voucher" placeholder="Api-key" required>
                <input type="date" name="arrival" class="form-input" min="2023-01-01" max="2023-01-31" required>
                <input type="date" name="departure" class="form-input" min="2023-01-01" max="2023-01-31" required>
                <select name="room_id" id="rooms">
                    <option value="2">Southern Standard</option>
                </select>
                <div class="radio-wrapper">
                    <h3>Features</h3>
                    <div class="radio-selection">
                        <label for="dewey">Arctic Sauna $2</label>
                        <input type="checkbox" id="sauna" name="feature-1" value="1">
                    </div>
                    <div class="radio-selection">
                        <label for="dewey">Kettlebell Workout $3</label>
                        <input type="checkbox" id="workout" name="feature-2" value="2">
                    </div>
                    <div class="radio-selection">
                        <label for="dewey">Beer Tasting w. Manager $5</label>
                        <input type="checkbox" id="beer" name="feature-3" value="3">
                    </div>
                </div>

                <input class="submit" type="submit" value="Confirm Reservation">
            </form>
        </div>
        <div class="right-container">
            <img src="https://images.unsplash.com/photo-1601026375090-b77cb4c80fd5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80" alt="">
        </div>
    </section>

    <section id="room-3">
        <h1><?= fetchRoomNameCost($database)[2]["name"]; ?> <span class="rooms-title">$<?= fetchRoomNameCost($database)[2]["price"]; ?> / Night</span></h1>
        <div class="left-container">
            <section class="calendar-wrapper">
                <div class="calendar-container">
                    <?= $calendar3->draw(date("2023-01-01"), "eco"); ?>
                </div>
            </section>
            <form action="rooms.php" method="post">
                <input type="text" name="name" placeholder="Name" required>
                <input type="" name="voucher" placeholder="Api-key" required>
                <input type="date" name="arrival" class="form-input" min="2023-01-01" max="2023-01-31" required>
                <input type="date" name="departure" class="form-input" min="2023-01-01" max="2023-01-31" required>
                <select name="room_id" id="rooms">
                    <option value="3">Heaven of Hans</option>
                </select>
                <div class="radio-wrapper">
                    <h3>Features</h3>
                    <div class="radio-selection">
                        <label for="dewey">Arctic Sauna $2</label>
                        <input type="checkbox" id="sauna" name="feature-1" value="1">
                    </div>
                    <div class="radio-selection">
                        <label for="dewey">Kettlebell Workout $3</label>
                        <input type="checkbox" id="workout" name="feature-2" value="2">
                    </div>
                    <div class="radio-selection">
                        <label for="dewey">Beer Tasting w. Manager $5</label>
                        <input type="checkbox" id="beer" name="feature-3" value="3">
                    </div>
                </div>

                <input id="submitButton" class="submit" type="submit" value="Confirm Reservation">
            </form>
        </div>
        <div class="right-container">
            <img src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
        </div>
    </section>
</main>
<?php require __DIR__ . "/views/footer.php"; ?>