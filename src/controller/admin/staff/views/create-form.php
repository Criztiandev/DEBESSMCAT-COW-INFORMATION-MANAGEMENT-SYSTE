<?php
use lib\Mangoose\Model;
use lib\Utils\Session;


$user_credentials = (new Model("USERS"))->findAll(["ROLE" => "staff"]);
$cow_credentials = (new MOdel("COWS"))->findAll();

display("admin/staff/create.view.php", [
    "payload" => $user_credentials,
    "cow_payload" => $cow_credentials,
    "error" => Session::get("error") ?? null,
    "success" => Session::get("success" ?? null)
]);