<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$response = (new Model("USERS"))->findAll();


display("admin/users/screen.view.php", [
    "payload" => $response,
    "error" => Session::get("error") ?? null,
    "success" => Session::get("success" ?? null)
]);