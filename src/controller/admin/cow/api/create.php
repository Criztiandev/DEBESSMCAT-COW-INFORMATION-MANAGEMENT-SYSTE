<?php
use lib\Mangoose\Model;
use lib\Utils\Session;
use Ramsey\Uuid\Uuid;


$cow_model = new Model("COWS");
$cow_credentials = $cow_model->findOne(["COW_ID" => $_POST["COW_ID"]]);

if ($cow_credentials) {
    Session::flash("error", "Cow is already exist");
    redirect("/cow");
}

$uuid = Uuid::uuid4();
$created_cow = $cow_model->createOne([
    "ID" => $uuid,
    "COW_ID" => $_POST["COW_ID"],
    "BREED" => $_POST["BREED"],
    "AGE" => $_POST["AGE"],
    'WEIGHT' => $_POST['WEIGHT'],
    'HEALTH_STATUS' => $_POST['STATUS'],
    'PRICE' => $_POST['PRICE'],
]);

if (!$created_cow) {
    Session::flash("error", "Something went wrong, Please try again later");
    redirect("/cow");
}

Session::flash("success", "Created Successfully");
redirect("/cow");
