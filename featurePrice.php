<?php

declare(strict_types=1);
require __DIR__ . "/vendor/autoload.php";

function getFeaturePrice($database, string $featureId = null)
{
    $stmt = connect($database)->query(
        "SELECT price FROM features WHERE id = :feature_id;"
    );

    $stmt->bindParam(':feature_id', $featureId, PDO::PARAM_INT);
    $stmt->execute();
    $featurePrice = $stmt->fetch(PDO::FETCH_ASSOC);
    $price = $featurePrice["price"];
    return $price;
}
