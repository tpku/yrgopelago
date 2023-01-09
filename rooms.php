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
                    <span class="price">$2</span>
                    <img class="room-img" src="https://images.unsplash.com/photo-1619207265576-787cc49b2784?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
                </div>
                <h2 class="room-name">Economy</h2>
                <p class="room-info">$2 per/night</p>
                <p class="room-info">Our most affordable room. Also our smallest room available. However, when you have the great views of Southern Isles just outside the door you won't need more than a simple bed.</p>
                <a class="room-booking" href="#room-1">
                    <h2>Make a reservation</h2>
                </a>
            </article>

            <article class="room card" id="card-std">
                <div class="img-container">
                    <span class="price">$3</span>
                    <img class="room-img" src="https://images.unsplash.com/photo-1601026375090-b77cb4c80fd5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80" alt="">
                </div>
                <h2 class="room-name">Southern Standard</h2>
                <p class="room-info">$3 per/night</p>
                <p class="room-info">Comfort with a budget. This is our standard room. Inspired by the locals whom have strolled the plains of the Southern for decades.</p>
                <a class="room-booking" href="#room-2">
                    <h2>Make a reservation</h2>
                </a>
            </article>

            <article class="room card" id="card-lux">
                <div class="img-container">
                    <span class="price">$7</span>
                    <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
                </div>
                <h2 class="room-name">Heaven of Hans</h2>
                <p class="room-info">$7 per/night</p>
                <p class="room-info">Our finest suite. Not called Heaven for no reason. Hans's home deserves a suite in it's honor. Heaven in comparison to the movie Frozen</p>
                <a class="room-booking" href="#room-3">
                    <h2>Make a reservation</h2>
                </a>
            </article>
        </div>
        <!-- | Print Messages | -->
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
    </section>

    <section id="room-1">
        <h1>Economy</h1>
        <section class="calendar-wrapper">
            <div class="calendar-container">
                <?= $calendar1->draw(date("2023-01-01"), "eco"); ?>
            </div>
        </section>
        <form action="rooms.php" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="" name="voucher" placeholder="Voucher" required>
            <input type="date" name="arrival" class="form-input" min="2023-01-01" max="2023-01-31" required>
            <input type="date" name="departure" class="form-input" min="2023-01-01" max="2023-01-31" required>
            <select name="room_id" id="rooms">
                <option value="1">Economy</option>
                <!-- <option value="2">Southern Standard</option>
            <option value="3">Heaven of Hans</option> -->
            </select>
            <div class="radio-wrapper">
                <h3>Features</h3>
                <div class="radio-selection">
                    <label for="dewey">Arctic Sauna</label>
                    <input type="checkbox" id="sauna" name="feature-1" value="1">
                </div>
                <div class="radio-selection">
                    <label for="dewey">Kettlebell Workout</label>
                    <input type="checkbox" id="workout" name="feature-2" value="2">
                </div>
                <div class="radio-selection">
                    <label for="dewey">Beer Tasting w. Manager</label>
                    <input type="checkbox" id="beer" name="feature-3" value="3">
                </div>
            </div>

            <input class="submit" type="submit" value="Send data">
        </form>
    </section>

    <section id="room-2">
        <h1>Southern Standard</h1>
        <section class="calendar-wrapper">
            <div class="calendar-container">
                <?= $calendar2->draw(date("2023-01-01"), "eco"); ?>
            </div>
        </section>
        <form action="rooms.php" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="" name="voucher" placeholder="Voucher" required>
            <input type="date" name="arrival" class="form-input" min="2023-01-01" max="2023-01-31" required>
            <input type="date" name="departure" class="form-input" min="2023-01-01" max="2023-01-31" required>
            <select name="room_id" id="rooms">
                <!-- <option value="1">Economy</option> -->
                <option value="2">Southern Standard</option>
                <!-- <option value="3">Heaven of Hans</option> -->
            </select>
            <div class="radio-wrapper">
                <h3>Features</h3>
                <div class="radio-selection">
                    <label for="dewey">Arctic Sauna</label>
                    <input type="checkbox" id="sauna" name="feature-1" value="1">
                </div>
                <div class="radio-selection">
                    <label for="dewey">Kettlebell Workout</label>
                    <input type="checkbox" id="workout" name="feature-2" value="2">
                </div>
                <div class="radio-selection">
                    <label for="dewey">Beer Tasting w. Manager</label>
                    <input type="checkbox" id="beer" name="feature-3" value="3">
                </div>
            </div>

            <input class="submit" type="submit" value="Send data">
        </form>
    </section>

    <section id="room-3">
        <h1>Heaven of Hans</h1>
        <section class="calendar-wrapper">
            <div class="calendar-container">
                <?= $calendar3->draw(date("2023-01-01"), "eco"); ?>
            </div>
        </section>
        <form action="rooms.php" method="post">
            <input type="text" name="name" placeholder="Name" required>
            <input type="" name="voucher" placeholder="Voucher" required>
            <input type="date" name="arrival" class="form-input" min="2023-01-01" max="2023-01-31" required>
            <input type="date" name="departure" class="form-input" min="2023-01-01" max="2023-01-31" required>
            <select name="room_id" id="rooms">
                <!-- <option value="1">Economy</option>
            <option value="2">Southern Standard</option> -->
                <option value="3">Heaven of Hans</option>
            </select>
            <div class="radio-wrapper">
                <h3>Features</h3>
                <div class="radio-selection">
                    <label for="dewey">Arctic Sauna</label>
                    <input type="checkbox" id="sauna" name="feature-1" value="1">
                </div>
                <div class="radio-selection">
                    <label for="dewey">Kettlebell Workout</label>
                    <input type="checkbox" id="workout" name="feature-2" value="2">
                </div>
                <div class="radio-selection">
                    <label for="dewey">Beer Tasting w. Manager</label>
                    <input type="checkbox" id="beer" name="feature-3" value="3">
                </div>
            </div>

            <input id="submitButton" class="submit" type="submit" value="Send data">
        </form>
    </section>
</main>
<?php require __DIR__ . "/views/footer.php"; ?>