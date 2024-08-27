<?php
use lib\Mangoose\Model;
use lib\Utils\Session;


$cow_credentials = (new Model("COWS"))->findAll();

display("admin/feed/create.view.php", [
    "cows" => $cow_credentials,
    "error" => Session::get("error") ?? null,
    "success" => Session::get("success" ?? null)
]);