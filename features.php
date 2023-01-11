<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";
require __DIR__ . "/views/header.php";
?>

<main>
    <section class="rooms">
        <h1 class="heading card">FEATURES</h1>
        <div class="article-wrapper">
            <article class="room card" id="card-eco">
                <div class="img-container">
                    <img class="room-img" src="https://images.unsplash.com/photo-1655713009067-ac82675d4e12?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
                </div>
                <h2 class="room-name">Arctic Sauna</h2>
                <p class="room-info">$2</p>
                <p class="room-info">Treat yourself like a proper northerner. Take a break from the majestic views of Southern Isles and jump into the wooden sauna. Sit by yourself or have a cold one with your friends. No visit to Hans's Haven is complete unless you've enjoyed our saunas.</p>
            </article>

            <article class="room card" id="card-std">
                <div class="img-container">
                    <img class="room-img" src="https://images.unsplash.com/photo-1519311965067-36d3e5f33d39?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2342&q=80" alt="">
                </div>
                <h2 class="room-name">Kettlebell Workout</h2>
                <p class="room-info">$3</p>
                <p class="room-info">Book a private kettlebell class with our world class instructors. 2 hours of pure joy or hell. Swinging kettlebells, snatching barbells, way to many burpees. But vacation has never felt better like after an KB class at Hans's.</p>
            </article>

            <article class="room card" id="card-lux">
                <div class="img-container">
                    <img class="room-img" src="https://images.unsplash.com/photo-1584225064536-d0fbc0a10f18?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2274&q=80" alt="">
                </div>
                <h2 class="room-name">Beer tasting with Manager</h2>
                <p class="room-info">$5</p>
                <p class="room-info">Like beer? Book a private beer tasting with our own manager. Only local beer brewed on Southern Isles and every tasting comes with some local snack. What a perfect way to finnish of your day. Worth every penny!</p>
            </article>
        </div>
        </p>
    </section>
    <section class="features">
        <h1>FEATURES</h1>
        <div class="features article-wrapper">
            <article>
                <img class="room-img" src="/img/sauna.jpg" alt="">
                <div class="text-container">
                    <h2>Arctic Sauna</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam totam officia sunt velit ipsum asperiores neque aspernatur hic autem laudantium natus officiis ut dolore itaque suscipit eius nobis, accusamus at.</p>
                </div>
            </article>
        </div>
    </section>
</main>
<?php require __DIR__ . "/views/footer.php"; ?>