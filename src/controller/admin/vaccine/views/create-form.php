<?php
use lib\Mangoose\Model;
use lib\Utils\Session;


$vaccine_credentials = (new Model("VACCINE_MONITORING"))->findAll();
$cow_credentials = (new Model("COWS"))->findAll();

display("admin/vaccine/create.view.php", [
    "vaccine" => $vaccine_credentials,
    "cows" => $cow_credentials,
    "error" => Session::get("error") ?? null,
    "success" => Session::get("success" ?? null)
]);