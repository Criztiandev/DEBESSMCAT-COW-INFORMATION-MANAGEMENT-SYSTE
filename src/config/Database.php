<?php
namespace config;

use PDO;
use PDOException;


class Database
{
    private $host;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    protected $statement;

    public function __construct($config)
    {
        $this->host = $config['host'];
        $this->username = $config['username'];
        $this->password = $config['password'];
        $this->dbname = $config['dbname'];

        $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";

        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }

    public function create($query, $params = [])
    {
    }


    public function query($query, $params = [])
    {
        try {
            $this->statement = $this->conn->prepare($query);
            $this->statement->execute($params);

            return $this;
        } catch (PDOException $e) {
            die("Query failed: " . $e->getMessage());
        }
    }


    public function get()
    {
        $result = $this->statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }


    public function getAll()
    {
        $result = $this->statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }



}