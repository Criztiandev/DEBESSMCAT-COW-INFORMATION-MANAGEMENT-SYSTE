<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$response = (new Model("STAFF"))->findAll();


display("admin/staff/screen.view.php", [
    "payload" => $response,
    "error" => Session::get("error") ?? null,
    "success" => Session::get("success" ?? null)
]);