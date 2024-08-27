<?php

use lib\Mangoose\Model;
use lib\Utils\Session;
use Ramsey\Uuid\Uuid;

$cow_model = new Model("COWS");
$vaccine_model = new Model("VACCINE_MONITORING");

$cow_credentials = $cow_model->findOne(["COW_ID" => $_POST["COW_ID"]]);

if (!$cow_credentials) {
    Session::flash("error", "Cow doesn't exist");
    redirect("/vaccine");
}

//! Need to update it doesnt suppoerr multiple filter
// $vaccine_scheduled = $vaccine_model->findOne([], [
//     "COW_ID" => $_POST["COW_ID"],
//     "DOV" => $_POST["DOV"]
// ]);

// if ($vaccine_scheduled) {
//     Session::flash("error", "Vaccination date is already scheduled");
//     redirect("/vaccine/create");
// }

// If we've reached this point, we can insert the new vaccination record
$uuid = Uuid::uuid4();

$created_vaccine = $vaccine_model->createOne([
    "ID" => $uuid,
    "COW_ID" => $_POST['COW_ID'],
    "VACCINE_TYPE" => $_POST["TYPE"],
    "DOV" => $_POST["DOV"]
]);

if (!$created_vaccine) {
    Session::flash("error", "Something went wrong. Please try again later");
    redirect("/vaccine/create");
}

Session::flash("success", "Created Successfully");
redirect("/vaccine");