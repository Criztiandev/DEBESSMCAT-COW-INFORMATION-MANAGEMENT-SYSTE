<?php
use lib\Utils\Session;
use lib\Mangoose\Model;

$TID = $_POST["TARGET_ID"];

$cow_model = new Model("COWS");
$cow_credentials = $cow_model->findOne(["COW_ID" => $TID]);

if (!$cow_credentials) {
    Session::flash("error", "Cow doesn't exist");
    redirect("/cow");
    exit;
}
$deleted_cow = $cow_model->deleteOne(["COW_ID" => $TID]);

if (!$deleted_cow) {
    http_response_code(400);
    Session::flash("error", "Deletion failed. Please try again later.");
}

http_response_code(200);
Session::flash("success", "Deletion Successfull");
redirect("/cow");