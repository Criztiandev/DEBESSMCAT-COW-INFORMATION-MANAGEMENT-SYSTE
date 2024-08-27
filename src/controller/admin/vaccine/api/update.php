<?php

use lib\Mangoose\Model;
use lib\Utils\Session;

$COW_ID = $_GET['id'] ?? '';

$cow_model = new Model("COWS");
$vaccine_model = new Model("VACCINE_MONITORING");

$cow_credentials = $cow_model->findOne(["COW_ID" => $COW_ID], [
    "select" => "ID"
]);

if (!$cow_credentials) {
    Session::flash("error", "Cow doesn't exist");
    redirect("/vaccine/update?id=" . urlencode($COW_ID));
    exit;
}


$updated_vaccine = $vaccine_model->updateOne([
    'VACCINE_TYPE' => $_POST['TYPE'],
    'DOV' => $_POST['DOV'],
], ["COW_ID" => $COW_ID]);


if (!$updated_vaccine) {
    http_response_code(400);
    Session::flash("error", "Update failed. Please try again later.");
    redirect("/vaccine/update?id=" . urlencode($COW_ID));
}


http_response_code(200);
Session::flash("success", "Updated successfully");
redirect("/vaccine/update?id=" . urlencode($COW_ID));