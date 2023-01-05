<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/hotelFunctions.php";

/* Temporary test data. TransferCode is valid if totalCost is <= 20. Not valid if > 20 */
// $transferCode = "fa06e0b0-1751-43de-9b18-25c10df72e30";
// $totalCost = 11;
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
        // print_r(json_encode($transfer_code));
        // print_r($transfer_code);
        // echo "</pre>";

        if (isset($transfer_code->transferCode)) {
            /* Valid Transfer Code */
            return true;
        } elseif (isset($transfer_code->error)) {
            /* Invalid Transfer Code */
            return false;
        }
    }
}
