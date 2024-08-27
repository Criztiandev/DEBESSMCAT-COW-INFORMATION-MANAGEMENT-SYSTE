<?php

use Symfony\Component\Dotenv\Dotenv;
use lib\Config;

session_start();

const BASE_PATH = __DIR__ . "/../";
require BASE_PATH . "vendor/autoload.php";


$config = Config::getInstance();
$dotenv = new Dotenv();
$dotenv->load(BASE_PATH . '.env');

$app = "ZT";


$config->load("server.php");