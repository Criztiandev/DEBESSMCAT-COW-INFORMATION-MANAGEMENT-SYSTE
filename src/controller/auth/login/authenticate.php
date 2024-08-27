<?php
use lib\Auth\Authenticator;
use lib\Utils\Session;


$email = $_POST['email'];
$password = $_POST['password'];


$response = (new Authenticator())->attempt($email, $password);

if ($response['data']) {
    return redirect("/");
} else {
    Session::flash('error', $response['message']);
    return redirect("/");
}

