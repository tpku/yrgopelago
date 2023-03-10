<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/hotelFunctions.php";

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
            $errors[] = $transfer_code->error;
            return false;
        } else {
            return true;
        }
    }
}
