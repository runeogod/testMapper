<?php
require __DIR__.'/../vendor/autoload.php';
use Src\Database\DatabaseHandler as DatabaseHandler;

use Dotenv\Dotenv;

$dotenv = Dotenv::create(__DIR__ . '/../');
$dotenv->load();

$db = (new DatabaseHandler())->getConnection();

?>