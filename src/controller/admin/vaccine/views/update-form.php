<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$COW_ID = $_GET['id'];
$credentials = (new Model("VACCINE_MONITORING"))->findOne(["COW_ID" => $COW_ID]);


display("admin/vaccine/update.view.php", [
    'credentials' => $credentials,
    "error" => Session::get("error"),
    "success" => Session::get("success")
]);