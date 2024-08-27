<?php
use lib\Router\Express;
use middleware\Authenticate;

$router = Express::Router();
$router->use((new Authenticate)->handle(...));


// Dasboard
$router->get("/", "controller/admin/cow/index.php");


// Cow route

$router->get("/cow", "controller/admin/cow/index.php");
$router->get("/cow/create", "controller/admin/cow/views/create-form.php");
$router->get("/cow/update", "controller/admin/cow/views/update-form.php");


$router->post("/cow/create", "controller/admin/cow/api/create.php");
$router->put("/cow/update", "controller/admin/cow/api/update.php");
$router->delete("/cow/delete", "controller/admin/cow/api/delete.php");


// Vaccine Route
$router->get("/vaccine", "controller/admin/vaccine/index.php");
$router->get("/vaccine/create", "controller/admin/vaccine/views/create-form.php");
$router->get("/vaccine/update", "controller/admin/vaccine/views/update-form.php");

$router->post("/vaccine/create", "controller/admin/vaccine/api/create.php");
$router->put("/vaccine/update", "controller/admin/vaccine/api/update.php");
$router->delete("/vaccine/delete", "controller/admin/vaccine/api/delete.php");

// Feed Route
$router->get("/feed", "controller/admin/feed/index.php");
$router->get("/feed/create", "controller/admin/feed/views/create-form.php");
$router->get("/feed/update", "controller/admin/feed/views/update-form.php");

$router->post("/feed/create", "controller/admin/feed/api/create.php");
$router->put("/feed/update", "controller/admin/feed/api/update.php");
$router->delete("/feed/delete", "controller/admin/feed/api/delete.php");

// User Route
$router->get("/users", "controller/admin/users/index.php");
$router->get("/users/create", "controller/admin/users/views/create-form.php");
$router->get("/users/update", "controller/admin/users/views/update-form.php");

$router->post("/users/create", "controller/admin/users/api/create.php");
$router->put("/users/update", "controller/admin/users/api/update.php");
$router->delete("/users/delete", "controller/admin/users/api/delete.php");


// User Route
$router->get("/staff", "controller/admin/staff/index.php");
$router->get("/staff/create", "controller/admin/staff/views/create-form.php");

$router->post("/staff/create", "controller/admin/staff/api/create.php");
$router->delete("/staff/delete", "controller/admin/staff/api/delete.php");


// account
$router->delete("/account/logout", "controller/admin/account/logout.php");

