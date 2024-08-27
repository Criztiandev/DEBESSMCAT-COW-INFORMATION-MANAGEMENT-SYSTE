<?php

use lib\Mangoose\Model;
use lib\Utils\Session;

$CID = $_GET['id'] ?? '';

$cow_model = new Model("COWS");
$feed_model = new Model("FEEDING_MONITORING");

$cow_credentials = $cow_model->findOne(["COW_ID" => $CID], [
    "select" => "ID"
]);


if (!$cow_credentials) {
    Session::flash("error", "Cow doesn't exist");
    redirect("/feed/update?id=" . urlencode($CID));
}


unset($_POST["_method"]);
$update_feed = $feed_model->updateOne([
    ...$_POST,
], ["COW_ID" => $CID]);


if (!$update_feed) {
    http_response_code(400);
    Session::flash("error", "Update failed, Please try again later");
    redirect("/feed/update?id=" . urlencode($CID));
}
http_response_code(200);
Session::flash("success", "Updated successfully");
redirect("/feed/update?id=" . urlencode($CID));