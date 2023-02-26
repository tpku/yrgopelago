<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/hotelFunctions.php";


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

        if (isset($transfer_code->transferCode)) {
            /* Valid Transfer Code */
            return true;
        } elseif (isset($transfer_code->error)) {
            /* Invalid Transfer Code */
            return false;
        }
    }
}
