<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$users_model = new Model("USERS");
$staff_model = new Model("STAFF");

$staff_credentials = $staff_model->findOne(["ID" => $_POST["TARGET_ID"]], ["select" => "USER_ID"]);

if (!$staff_credentials) {
    http_response_code(400);
    Session::flash("error", "Staff doest exist, Please try again");
    redirect("/staff");
}

// check if the account exist
$user_credentials = $users_model->findOne(["ID" => $staff_credentials["USER_ID"]], ["select" => "ID"]);

if (!$user_credentials) {
    http_response_code(400);
    Session::flash("error", "User doest exist, Please try again");
    redirect("/staff");
}

// delete the staff
$delete_response = $staff_model->deleteOne(["ID" => $_POST["TARGET_ID"]]);

if (!$delete_response) {
    http_response_code(400);
    Session::flash("error", "Deletion failed. Please try again later.");
    redirect("/staff");
}

http_response_code(200);
Session::flash("success", "Deleted successfully");
redirect("/staff");