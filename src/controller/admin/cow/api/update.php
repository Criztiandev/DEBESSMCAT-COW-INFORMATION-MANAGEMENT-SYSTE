<?php
use lib\Mangoose\Model;
use lib\Utils\Session;

$curernt_cow_id = $_GET["id"];
$cow_model = new Model("COWS");
$cow_credentials = $cow_model->findOne(["COW_ID" => $curernt_cow_id]);

if (!$cow_credentials) {
    Session::flash("error", "Cow doesn't exist");
    redirect("/cow/update?id=" . urlencode($curernt_cow_id));
    exit;
}



$updated_cow = $cow_model->updateOne([
    'COW_ID' => $_POST['COW_ID'],
    'BREED' => $_POST['BREED'],
    'AGE' => $_POST['AGE'],
    'WEIGHT' => $_POST['WEIGHT'],
    'HEALTH_STATUS' => $_POST['HEALTH_STATUS'],
    'PRICE' => $_POST['PRICE'],
], ['COW_ID' => $curernt_cow_id]);

if (!$updated_cow) {
    http_response_code(400);
    Session::flash("error", "Update failed. Please try again later.");
}

http_response_code(200);
Session::flash("success", "Updated successfully");
redirect("/cow/update?id=" . urlencode($curernt_cow_id));