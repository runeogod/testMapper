<?php
require __DIR__.'/vendor/autoload.php';
use Dotenv\Dotenv;
use Src\Repository\AirportRepository as AirportRepository;
use Src\Controller\DestinationController as DestinationController;

$dotenv = Dotenv::create(__DIR__);
$dotenv->load();


if (!isset($_SERVER['APP_ENV'])) {
    if (!class_exists(Dotenv::class)) {
        throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
    }
    (Dotenv::create(__DIR__))->load();
}

header('Content-Type: application/json');

$airportRepo = null;

$destCtrl = new DestinationController();

//** Uncomment the one you want  */

$destCtrl->calculateRoute('Barcelona', 'Sweden');
//$destCtrl->calculateRoute('New York', 'Sweden');
//$destCtrl->calculateRoute('Madrid', 'Sweden');


?>