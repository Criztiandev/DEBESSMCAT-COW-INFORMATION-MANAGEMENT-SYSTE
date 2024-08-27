<?php

namespace lib\Utils;


class Session
{

    public static function has($key)
    {
        return (bool) static::get($key);
    }

    public static function insert($key, $value)
    {
        return $_SESSION[$key] = $value;
    }

    public static function get($key, $default = null)
    {
        if (isset($_SESSION['_flash'][$key])) {
            return $_SESSION['_flash'][$key];
        }
        return $_SESSION[$key] ?? $default;
    }

    public static function revoke($key)
    {
        if ($key == 'flash') {
            unset($_SESSION['_flash']);
            return;
        }

        if (static::has($key)) {
            unset($_SESSION[$key]);
            return;
        }
        return false;
    }

    public static function flash($key, $value)
    {
        $_SESSION['_flash'][$key] = $value;
    }


    public static function flush()
    {
        $_SESSION = [];
    }

    public static function destroy()
    {
        static::flush();

        $params = session_get_cookie_params();
        setcookie(
            session_name(),     // Use the session name to ensure the correct cookie is deleted
            '',                 // Empty value to invalidate the cookie
            time() - 3600,      // Expiration time in the past
            $params['path'],    // Cookie path
            $params['domain'],  // Cookie domain
            $params['secure'],  // Secure flag (only send over HTTPS if true)
            $params['httponly'] // HttpOnly flag
        );

    }


}