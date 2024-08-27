<?php

namespace lib\Auth;

use lib\Mangoose\Model;
use lib\Utils\Session;

class Authenticator
{

    public function attempt($email, $password)
    {

        $user = (new Model("USERS"))->findOne(["EMAIL" => $email]);

        if (!$user) {
            return [
                'data' => false,
                'message' => "User doest exist, Please try again later"
            ];
        }


        if ($user) {

            $credentials = [
                "FULL_NAME" => $user['FIRST_NAME'] . $user['LAST_NAME'],
                "PHONE_NUMBER" => $user['PHONE_NUMBER'] ?? null,
                "EMAIL" => $user['EMAIL'],
                "ROLE" => $user['ROLE'] ?? "user"
            ];

            $this->createSession($user['ID'], $credentials);
            return [
                'data' => $credentials,
                'message' => ""
            ];
        } else {
            return [
                'data' => false,
                'message' => "Incorrect password, Please try again"
            ];
        }

    }

    public function createSession($UID, $credentials = [])
    {
        Session::insert('UID', $UID);
        Session::insert('user', $credentials);
        session_regenerate_id(true);
    }

    public function logout()
    {
        Session::flush();
        Session::destroy();
        return true;
    }
}