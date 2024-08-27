<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$ID = $_GET['id'];
$credentials = (new Model("USERS"))->findOne(["ID" => $ID]);


display("admin/users/update.view.php", [
    'credentials' => $credentials,
    "error" => Session::get("error"),
    "success" => Session::get("success")
]);