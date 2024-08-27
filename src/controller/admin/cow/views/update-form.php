<?php
use lib\Mangoose\Model;
use lib\Utils\Session;


$COW_ID = $_GET['id'];
$cow_credentials = (new Model("COWS"))->findOne(["COW_ID" => $COW_ID]);

display("admin/cow/update.view.php", [
    'credentials' => $cow_credentials,
    "error" => Session::get("error"),
    "success" => Session::get("success")
]);