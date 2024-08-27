<?php
use lib\Router\Express;
use middleware\Authenticate;

$router = Express::Router();
$router->use((new Authenticate)->handle(...));


$router->get("/", 'controller/user/dashboard/index.php');
$router->delete("/account/logout", "controller/user/account/logout.php");

