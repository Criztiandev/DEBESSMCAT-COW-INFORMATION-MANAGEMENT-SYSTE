<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$response = (new Model("VACCINE_MONITORING"))->findAll();


display("admin/vaccine/screen.view.php", [
    "vaccine" => $response,
    "error" => Session::get("error") ?? null,
    "success" => Session::get("success" ?? null)
]);