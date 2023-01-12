<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";
require __DIR__ . "/views/header.php";

print_r(fetchRoomNameCost($database)[1]["price"]);

?>
<main>
    <section class="start">
        <article class="top">
            <h1>Welcome to <?= $hotelName ?>!</h1>
            <div class="content-container">
                <div class="left">
                    <p>A great place to enjoy the great wonders of Southern Isles.</p>
                    <p>Situated under the northern lights in the winter, and the midnight sun during the summer months, Han's Haven is a unique hotel and spa experience that welcomes guests to immerse themselves in the elements while leaving a minimal environmental footprint behind with a twist for the hardcore Frozen fan. Enjoy the great nature surrounding the hotel, grab a bite of food in our restaurant with or kickstart your body and mind at our exclusive box with world class instructors.</p>

                    <h2><a href="rooms.php">Deal of the month!</a></h2>

                    <p>Right now! Make a reservation for $35 or more and save $5!</p>
                </div>
                <div class="right">
                    <img class="room-img" src="https://images.unsplash.com/photo-1527004013197-933c4bb611b3?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2274&q=80" alt="">
                </div>
            </div>
        </article>
    </section>
</main>
<?php require __DIR__ . "/views/footer.php"; ?>