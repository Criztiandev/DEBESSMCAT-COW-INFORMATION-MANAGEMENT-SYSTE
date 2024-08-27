<?php

use lib\Utils\Session;


display("auth/login.view.php", [
    "error" => Session::get("error")
]);
