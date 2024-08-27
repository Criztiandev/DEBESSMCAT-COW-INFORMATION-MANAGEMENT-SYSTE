<?php
use lib\Mangoose\Model;
use lib\Utils\Session;



display("admin/users/create.view.php", [
    "error" => Session::get("error") ?? null,
    "success" => Session::get("success" ?? null)
]);