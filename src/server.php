<?php
use config\Credentials;
use lib\Mangoose\Mangoose;
use lib\Router\Express;
use lib\Utils\Session;
use lib\Config;

require from("utils/helper.utils.php");

$app = new Express();
$db = Mangoose::connect($_ENV['DEV_ENV'] ? Credentials::getDevelopmentDSN() : Credentials::getProductionDSN());

require from("routes/index.php");


$app->listen();
Session::revoke("flash");