<?php

namespace lib\Router;

class Express
{
    protected $middleware = [];
    protected $currentMiddleware = null;

    public static function Router()
    {
        return Router::getInstance();
    }

    public function use($middleware)
    {
        Router::getInstance()->use($middleware);
        return $this;
    }

    public function listen()
    {
        Router::getInstance()->listen();
    }

    public function redirect($url, $statusCode = 302)
    {
        header("Location: $url", true, $statusCode);
        exit;
    }
}