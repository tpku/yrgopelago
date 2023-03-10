<?php

declare(strict_types=1);

// Always require autoload when using packages
require(__DIR__ . '/vendor/autoload.php');

// Tell PHP to use this fine package
use Dotenv\Dotenv;

// "Connect" to .env and load it's content into $_ENV
$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

echo $_ENV['API_KEY'];
echo $_ENV['USER_NAME'];
