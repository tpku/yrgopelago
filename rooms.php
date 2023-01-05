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
    <h1 class="heading card">ROOMS</h1>
    <section class="rooms">
        <article class="room card">
            <div class="img-container">
                <span class="price">$2</span>
                <img class="room-img" src="https://images.unsplash.com/photo-1619207265576-787cc49b2784?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
            </div>
            <h2 class="room-name">Economy</h2>
            <p class="room-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, vitae blanditiis? Repellendus est id numquam officia modi laudantium. Consectetur fuga veritatis veniam repellat voluptas dicta voluptatum impedit recusandae tempore numquam.</p>
            <a href="/room1.php">Available rooms ></a>
        </article>
        <article class="room card">
            <div class="img-container">
                <span class="price">$3</span>
                <img class="room-img" src="https://images.unsplash.com/photo-1601026375090-b77cb4c80fd5?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=987&q=80" alt="">
            </div>
            <h2 class="room-name">Southern Standard</h2>
            <p class="room-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus deleniti, rerum sequi inventore ea hic praesentium id quam recusandae temporibus? Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ex, laudantium!</p>
        </article>
        <article class="room card">
            <div class="img-container">
                <span class="price">$5</span>
                <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">
            </div>
            <h2 class="room-name">Heaven of Hans</h2>
            <p class="room-info">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate neque, beatae eveniet animi quibusdam quos! Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque, suscipit.</p>
        </article>
    </section>

</main>
<?php require __DIR__ . "/views/footer.php"; ?>