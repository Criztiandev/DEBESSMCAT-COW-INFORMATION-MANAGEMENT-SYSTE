<?php
use lib\Mangoose\Model;
use lib\Utils\Session;



$response = (new Model("COWS"))->findAll();

display("admin/cow/screen.view.php", [
    "cows" => $response,
    "error" => Session::get("error"),
    "success" => Session::get("success")
]);