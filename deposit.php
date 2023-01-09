<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/hotelFunctions.php";

/* Temporary test data. TransferCode is valid if totalCost is <= 20. Not valid if > 20 */
$transferCode = "fa06e0b0-1751-43de-9b18-25c10df72e30";
$name = "Tommi";
// $totalCost = 11;
// print_r(isValidUuid($transferCode));

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

function depositTransferCode(string $name, string $transferCode)
{
    $client = new Client();

    $response = $client->request(
        'POST',
        'https://www.yrgopelago.se/centralbank/deposit',
        [
            'form_params' => [
                'user' => $name,
                'transferCode' => $transferCode
            ]
        ]
    );

    if ($response->hasHeader('Content-Length')) {
        $transfer_code = json_decode($response->getBody()->getContents());

        if (isset($transfer_code->error)) {
            /* Invalid Transfer Code */
            print_r($transfer_code);
            return false;
        } else {
            print_r($transfer_code);
        }
    }
}

print_r(depositTransferCode($name, $transferCode));
