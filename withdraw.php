<?php

declare(strict_types=1);

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/hotelFunctions.php";

/* Dummy data for testing */
// $apiKey = "ab14cbb2-f550-46e6-97c2-bb7f0126733e";
// $inputUser = "Rune";
// $totalCost = 10;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;

function withDrawTransferCode(string $inputUser, string $apiKey, int $totalCost)
{
    $client = new Client();

    $response = $client->request(
        'POST',
        'https://www.yrgopelago.se/centralbank/withdraw',
        [
            'form_params' => [
                'user' => $inputUser,
                'api_key' => $apiKey,
                'amount' => $totalCost,
            ]
        ]
    );

    if ($response->hasHeader('Content-Length')) {
        $transfer_code = json_decode($response->getBody()->getContents());

        if (isset($transfer_code->error)) {
            /* If something went wrong withdrawing transfer code */
            $errors[] = $transfer_code->error;
            return false;
        } else {
            /* If successful action */
            return $transfer_code->transferCode;
        }
    }
}
