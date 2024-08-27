<?php

use lib\Mangoose\Model;
use lib\Utils\Session;
use Ramsey\Uuid\Uuid;

// Add a multiple cow for the staff LOL

$staff_model = new Model("STAFF");

// check if user exist
$user_credentials = $staff_model->findOne(["USER_ID" => $_POST["USER_ID"]]);

if ($user_credentials) {
    Session::flash("error", "Staff already exist, Please try again later");
    redirect("/staff/create");
}

// check if the current staff is already assigned wit the provided cow

// salt the password


$uuid = Uuid::uuid4();
$created_user = $staff_model->createOne([
    "ID" => $uuid,
    "USER_ID" => $_POST["USER_ID"],
    "DESIGNATION" => $_POST["COW_ID"]
]);

if (!$created_user) {
    Session::flash("error", "Something went wrong. Please try again later");
    redirect("/staff/create");
}

Session::flash("success", "Created Successfully");
redirect("/staff");