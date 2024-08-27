<?php
use lib\Router\Express;

$router = Express::Router();


$router->get("/", 'controller/auth/login/screen.php');
$router->get("/login", 'controller/auth/login/screen.php');
$router->post("/login/auth", 'controller/auth/login/authenticate.php');
