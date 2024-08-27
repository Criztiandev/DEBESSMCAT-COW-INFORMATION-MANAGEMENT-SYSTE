<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$COW_ID = $_GET['id'];
$credentials = (new Model("FEEDING_MONITORING"))->findOne(["COW_ID" => $COW_ID]);


display("admin/feed/update.view.php", [
    'credentials' => $credentials,
    "error" => Session::get("error"),
    "success" => Session::get("success")
]);