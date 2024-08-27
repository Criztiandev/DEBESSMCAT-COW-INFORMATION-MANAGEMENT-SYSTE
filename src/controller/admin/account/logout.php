<?php
use lib\Auth\Authenticator;


// check if user exist
$auth = (new Authenticator)->logout();
redirect("/");