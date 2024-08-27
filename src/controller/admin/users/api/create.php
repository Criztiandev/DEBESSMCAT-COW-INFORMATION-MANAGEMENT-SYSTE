<?php

use lib\Mangoose\Model;
use lib\Utils\Session;
use Ramsey\Uuid\Uuid;

$user_model = new Model("USERS");
// check if user exist
$user_credentials = $user_model->findOne(["EMAIL" => $_POST["EMAIL"]], [
    "select" => "ID"
]);

if ($user_credentials) {
    Session::flash("error", "User already exist, Please try again later");
    redirect("/users/create");
}

// salt the password


$uuid = Uuid::uuid4();
$created_user = $user_model->createOne([
    "ID" => $uuid,
    ...$_POST,
]);

if (!$created_user) {
    Session::flash("error", "Something went wrong. Please try again later");
    redirect("/users/create");
}

Session::flash("success", "Created Successfully");
redirect("/users");