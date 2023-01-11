<?php
require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/calendar.php";
include __DIR__ . "/hotelFunctions.php";
include __DIR__ . "/form.php";
require __DIR__ . "/views/header.php";

$targetJson = file_get_contents(__DIR__ . "/bookings.json");
$tempArray = json_decode($targetJson, true);
$successfulBooking = json_encode(end($tempArray), JSON_PRETTY_PRINT);


?>

<main>
    <section class="receipt-section">
        <h1>Thank you for your booking!</h1>
        <div class="receipt">
            <p>Save receipt for later:</p>
            <br>
            <p class="booking-response">
                <?= "<pre>" . $successfulBooking; ?>
            </p>
        </div>
    </section>
</main>
<?php require __DIR__ . "/views/footer.php"; ?>