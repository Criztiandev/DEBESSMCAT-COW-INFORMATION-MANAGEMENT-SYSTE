<?php

use lib\Mangoose\Model;
use lib\Utils\Session;

$UID = $_GET['id'] ?? '';

$user_model = new Model("USERS");

$user_credentials = $user_model->findOne(["ID" => $UID]);

if (!$user_credentials) {
    Session::flash("error", "User doest exist, Please try again later");
    redirect("/users/update?id=" . urlencode($UID));
}


unset($_POST["_method"]);
$update_credentials = $user_model->updateOne([
    ...$_POST,
], ["ID" => $UID]);

if (!$update_credentials) {
    http_response_code(400);
    Session::flash("error", "Something went failed");
    redirect("/users/update?id=" . urlencode($UID));
}


http_response_code(200);
Session::flash("success", "Updated successfully");
redirect("/users/update?id=" . urlencode($UID));