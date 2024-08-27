<?php

namespace lib\Router;

use lib\Router\Middleware;



class Router
{
    private static $instance = null;
    private $routes = [];
    protected $middleware;


    /**
     * Private contructor to prevent direct creation of instance
     */

    private function __construct()
    {
        $this->middleware = new Middleware();
    }

    /**
     * Get the singleton instance
     */

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    /**
     * Add route to the router cache
     * @param mixed $uri
     * @param mixed $handler
     * @param mixed $method
     * @param mixed $controller
     * @return static
     */
    public function add($uri, $handler, $method, $controller = null)
    {
        $middleware = null;

        if (is_callable($handler)) {
            $middleware = $handler;
            $handler = $controller;
        }

        $this->routes[] = [
            "uri" => $uri,
            "handler" => $handler,
            "method" => strtoupper($method),
            "middleware" => $middleware
        ];

        return $this;
    }

    /**
     * Add a GET route on the router's object
     * @param mixed $uri
     * @param mixed $handler
     * @param mixed $controller
     * @return Router
     */
    public function get($uri, $handler, $controller = null)
    {
        return $this->add($uri, $handler, "GET", $controller);
    }

    /**
     * Add a POST route on the router's route
     * @param mixed $uri
     * @param mixed $handler
     * @param mixed $controller
     * @return Router
     */
    public function post($uri, $handler, $controller = null)
    {
        return $this->add($uri, $handler, "POST", $controller);
    }

    /**
     * Add a PUT route on the router's route
     * @param mixed $uri
     * @param mixed $handler
     * @param mixed $controller
     * @return Router
     */
    public function put($uri, $handler, $controller = null)
    {
        return $this->add($uri, $handler, "PUT", $controller);
    }

    /**
     * Add a Delete route on the router's route
     * @param mixed $uri
     * @param mixed $handler
     * @param mixed $controller
     * @return Router
     */
    public function delete($uri, $handler, $controller = null)
    {
        return $this->add($uri, $handler, "DELETE", $controller);
    }

    /**
     * Add a Patch route on the router's route
     * @param mixed $uri
     * @param mixed $handler
     * @param mixed $controller
     * @return Router
     */
    public function patch($uri, $handler, $controller = null)
    {
        return $this->add($uri, $handler, "PATCH", $controller);
    }


    /**
     * Add a middleware on the Global middleware
     * @param mixed $middleware
     * @return static
     */
    public function use($middleware)
    {
        $this->middleware->use($middleware);
        return $this;
    }

    /**
     * Listen to the incoming request
     * @return void
     */
    public function listen()
    {
        $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];


        $request = (object) [
            'uri' => $uri,
            'method' => $method,
            // Add fucking properties here
        ];

        $globalMiddlewareStack = $this->middleware->getMiddlewareStack($uri);

        $this->middleware->runMiddleware($globalMiddlewareStack, $request, function ($request) use ($uri, $method) {
            foreach ($this->routes as $route) {
                if ($route['uri'] === $uri && $route['method'] === $method) {
                    $routeMiddleware = $route['middleware'] ? [$route['middleware']] : [];

                    $this->middleware->runMiddleware($routeMiddleware, $request, function ($request) use ($route) {
                        if (is_callable($route['handler'])) {
                            call_user_func($route['handler']);
                        } elseif (is_string($route['handler'])) {
                            require from($route['handler']);
                        }
                    });

                    return;
                }
            }

            $this->abort(404);
        });
    }

    /**
     * Handle HTTP Error
     * @param mixed $code
     * @return void
     */
    protected function abort($code = 404)
    {
        http_response_code($code);
        display("+notfound.view.php");
    }


    public static function redirect($path)
    {
        header("location: {$path}");
        exit();
    }

}