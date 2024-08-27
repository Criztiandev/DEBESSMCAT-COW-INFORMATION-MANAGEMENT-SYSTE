<?php

namespace lib;

class Config
{
    private static $instance = null;
    private $config;

    private function __construct()
    {
        $this->config = require BASE_PATH . "phpconfig.php";
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function get($key = null)
    {
        if ($key === null) {
            return $this->config;
        }
        return $this->config[$key] ?? null;
    }

    public function load($path)
    {
        require BASE_PATH . $this->config["basePath"] . "utils/navigation.utils.php";
        require BASE_PATH . $this->config['basePath'] . $path;
    }

    // Prevent cloning of the instance
    private function __clone()
    {
    }

    // Prevent unserializing of the instance
    public function __wakeup()
    {
    }
}