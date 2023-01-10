<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";
require __DIR__ . "/views/header.php";

print_r(fetchRoomNameCost($database)[0]["name"]);

?>
<main>
    <section class="start">
        <h1>Welcome to <?= $hotelName ?>!</h1>
        <article>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam totam officia sunt velit ipsum asperiores neque aspernatur hic autem laudantium natus officiis ut dolore itaque suscipit eius nobis, accusamus at.</p>
            <h2>Deals!</h2>
            <p>Make a reservation for $35 or more and save $5! Only in January.</p>
        </article>
        <article>
            <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
        </article>
    </section>

    <section class="start-rooms">
        <article class="start-room">
            <h3><?= $roomName["eco"]; ?></h3>
            <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
        </article>
        <article class="start-room">
            <h3><?= $roomName["eco"]; ?></h3>
            <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
        </article>
        <article class="start-room">
            <h3><?= $roomName["eco"]; ?></h3>
            <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
        </article>
    </section>
</main>
<?php require __DIR__ . "/views/footer.php"; ?>