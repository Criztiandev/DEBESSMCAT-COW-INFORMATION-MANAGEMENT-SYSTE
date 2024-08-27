<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$response = (new Model("FEEDING_MONITORING"))->findAll();


display("admin/feed/screen.view.php", [
    "payload" => $response,
    "error" => Session::get("error") ?? null,
    "success" => Session::get("success" ?? null)
]);