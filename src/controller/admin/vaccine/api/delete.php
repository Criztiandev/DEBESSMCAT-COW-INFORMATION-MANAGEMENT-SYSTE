<?php

use lib\Mangoose\Model;
use lib\Utils\Session;

$TID = $_POST["TARGET_ID"];

$cow_model = new Model("COWS");
$vaccine_model = new Model("VACCINE_MONITORING");


$cow_credentials = $cow_model->findOne(["COW_ID" => $TID], [
    "select" => "ID"
]);

if (!$cow_credentials) {
    Session::flash("error", "Cow doesn't exist");
    redirect("/vaccine");
    exit;
}

// check vaccine
$vaccine_credentials = $vaccine_model->findOne(["COW_ID" => $TID], [
    "select" => "ID"
]);

if (!$vaccine_credentials) {
    Session::flash("error", "Vaccine doesn't exist");
    redirect("/vaccine");
    exit;
}

$VID = $vaccine_credentials["ID"];

$delete_vaccine = $vaccine_model->deleteOne(["ID" => $VID]);

if (!$delete_vaccine) {
    http_response_code(400);
    Session::flash("error", "Update failed. Please try again later.");
    redirect("/vaccine");
}


http_response_code(200);
Session::flash("success", "Deleted successfully");
redirect("/vaccine");