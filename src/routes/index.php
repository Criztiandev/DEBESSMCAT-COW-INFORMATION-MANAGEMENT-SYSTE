<?php

$isLoggedIn = $_SESSION['UID'] ?? "";
$role = $_SESSION['user']['ROLE'] ?? "";

$routes = [
    "user" => 'routes/user.routes.php',
    "admin" => 'routes/admin.routes.php',
    'auth' => 'routes/auth.routes.php'
];


if ($isLoggedIn && isset($routes[$role])) {
    require from($routes[$role]);
} else {
    require from('routes/auth.routes.php');
}