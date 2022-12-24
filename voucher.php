<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/hotelFunctions.php";

// Temporary hard coded variables to test function
// $transferCode = "c8872eed-46b4-48f0-8307-9c1c26ce49c0";
// $totalCost = 5;

// Not valid
// $transferCode = "fa06e0b0-1751-43de-9b18-25c10df72e30";
// $totalCost = 20;
// print_r(isValidUuid($transferCode));

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

function validateTransferCode(string $transferCode, int $totalCost)
{
    $client = new Client();

    $response = $client->request(
        'POST',
        'https://www.yrgopelago.se/centralbank/transferCode',
        [
            'form_params' => [
                'transferCode' => $transferCode,
                'totalcost' => $totalCost
            ]
        ]
    );

    if ($response->hasHeader('Content-Length')) {
        $transfer_code = json_decode($response->getBody()->getContents());
        // echo "<pre>";
        var_dump($transfer_code);
        // print_r($transfer_code);
        // echo "</pre>";
    }
}

// Test Print function
// validateTransferCode($transferCode, $totalCost);

// print_r(isValidUuid($isVoucherValid));
