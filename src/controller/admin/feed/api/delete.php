<?php

use lib\Mangoose\Model;
use lib\Utils\Session;


$TID = $_POST["TARGET_ID"];
$cow_model = new Model("COWS");
$feeding_model = new Model("FEEDING_MONITORING");

$cow_credentials = $cow_model->findOne(["COW_ID" => $TID], [
    "select" => "ID"
]);


if (!$cow_credentials) {
    Session::flash("error", "Cow doesn't exist");
    redirect("/feed");
    exit;
}

$feeding_credentials = $feeding_model->findOne(["COW_ID" => $TID], [
    "select" => "ID"
]);

if (!$feeding_credentials) {
    Session::flash("error", "Feed doesn't exist");
    redirect("/feed");
    exit;
}

$FID = $feeding_credentials["ID"];
$delete_credentials = $feeding_model->deleteOne(["ID" => $FID]);

if (!$delete_credentials) {
    http_response_code(400);
    Session::flash("error", "Update failed. Please try again later.");
    redirect("/feed");
}


http_response_code(200);
Session::flash("success", "Deleted successfully");
redirect("/feed");