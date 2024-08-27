<?php

use lib\Mangoose\Model;
use lib\Utils\Session;

$TID = $_POST["TARGET_ID"];

$user_model = new Model("USERS");

$user_credentials = $user_model->findOne(["ID" => $TID]);

if (!$user_credentials) {
    Session::flash("error", "User doesn't exist");
    redirect("/users");
}

$delete_response = $user_model->deleteOne(["ID" => $TID]);

if (!$delete_response) {
    http_response_code(400);
    Session::flash("error", "Deletion failed. Please try again later.");
    redirect("/users");
}

http_response_code(200);
Session::flash("success", "Deleted successfully");
redirect("/users");
