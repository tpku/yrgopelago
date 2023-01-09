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
    <section>
        <h1>FEATURES</h1>
        <article>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam totam officia sunt velit ipsum asperiores neque aspernatur hic autem laudantium natus officiis ut dolore itaque suscipit eius nobis, accusamus at.</p>
            <img class="room-img" src="https://images.unsplash.com/photo-1470770841072-f978cf4d019e?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2340&q=80" alt="">

        </article>
    </section>

</main>
<?php require __DIR__ . "/views/footer.php"; ?>