<?php

use lib\Mangoose\Model;
use lib\Utils\Session;
use Ramsey\Uuid\Uuid;

$cow_model = new Model("COWS");
$feed_model = new Model("FEEDING_MONITORING");

$cow_credentials = $cow_model->findOne(["COW_ID" => $_POST["COW_ID"]]);

if (!$cow_credentials) {
    Session::flash("error", "Cow doesn't exist");
    redirect("/feed/create");
}

// check if the cow is already assigend
$cow_feed_credentials = $feed_model->findOne(["COW_ID" => $_POST["COW_ID"]]);


if ($cow_feed_credentials) {
    Session::flash("error", "Cow is already assigned");
    redirect("/feed/create");
}

$uuid = Uuid::uuid4();
$created_feed = $feed_model->createOne([
    "ID" => $uuid,
    "COW_ID" => $_POST['COW_ID'],
    "FEED_TYPE" => $_POST["FEED_TYPE"],
    "QUANTITY" => $_POST["QUANTITY"],
    "FREQUENCY" => $_POST["FREQUENCY"]
]);

if (!$created_feed) {
    Session::flash("error", "Something went wrong. Please try again later");
    redirect("/feed/create");
}

Session::flash("success", "Created Successfully");
redirect("/feed");