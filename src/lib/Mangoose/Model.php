<?php

namespace lib\Mangoose;

use Exception;
use lib\Mangoose\Mangoose;

class Model
{
    public $table;
    public $database;
    public $conditions = [];
    public $selections = "*";
    public $queryType = 'SELECT';
    public $limit = null;

    public function __construct($table)
    {
        $this->table = $table;
        $this->database = Mangoose::getInstance();
    }

    public function findOne($params, $options = [])
    {
        try {
            $query = $this->buildQuery($params, $options);
            $statement = $this->executeQuery($query, $params);
            return $statement->fetch();
        } catch (\Exception $e) {
            error_log("Error in createOne: " . $e->getMessage());
            return null;
        }
    }


    public function findAll(array $params = [], array $options = [])
    {
        $query = $this->buildQuery($params, $options);
        $statement = $this->executeQuery($query, $params);
        return $statement->fetchAll();
    }

    public function createOne($params)
    {
        try {
            $query = $this->buildInsertQuery($params);
            return $this->executeQuery($query, $params);
        } catch (\Exception $e) {
            error_log("Error in createOne: " . $e->getMessage());
            return false;
        }
    }

    public function updateOne(array $update, $condition)
    {
        try {
            $query = $this->buildUpdateQuery($update, $condition);
            return $this->executeQuery($query, array_merge($update, $condition));
        } catch (Exception $e) {
            return null;
        }
    }

    public function deleteOne(array $conditions)
    {
        $query = $this->buildDeleteQuery($conditions);
        return $this->executeQuery($query, $conditions);
    }


    public function deleteMany(array $conditions)
    {
        if (empty($conditions)) {
            throw new \InvalidArgumentException("No conditions provided for deletion.");
        }

        $whereClause = $this->buildCondition($conditions);
        $query = "DELETE FROM " . $this->table . " WHERE $whereClause";

        $this->executeQuery($query, $conditions);
    }

    /**
     * Actions Class
     */

    protected function buildQuery($params, $options = [])
    {
        $selectedField = $options["select"] ?? $this->selections;
        $limit = isset($options['limit']) ? "LIMIT " . (int) $options['limit'] : '';

        $whereClause = $this->buildCondition($params);

        return "SELECT $selectedField FROM " . $this->table . " WHERE $whereClause $limit";
    }


    protected function buildInsertQuery($params)
    {
        $fields = array_keys($params);
        $placeholders = array_map(fn($fields) => ":$fields", $fields);

        $fieldClause = implode(", ", $fields);
        $placeholderClause = implode(", ", $placeholders);

        return "INSERT INTO " . $this->table . " ($fieldClause) VALUES ($placeholderClause)";
    }

    protected function buildUpdateQuery($params, $conditions)
    {
        $setters = $this->buildSetClause($params);
        $wheres = $this->buildCondition($conditions);

        return "UPDATE " . $this->table . " SET $setters WHERE $wheres";
    }

    protected function buildDeleteQuery(array $conditions): string
    {
        $whereClause = $this->buildCondition($conditions);
        return "DELETE FROM " . $this->table . " WHERE $whereClause";
    }



    /**
     * Helper Class
     */
    protected function buildCondition(array $conditions, $separator = " AND ")
    {
        if (empty($conditions)) {
            return 1;
        }

        return implode(' AND ', array_map(fn($field) => "$field = :$field", array_keys($conditions)));
    }



    protected function buildSetClause(array $params): string
    {
        return implode(', ', array_map(fn($field) => "$field = :$field", array_keys($params)));
    }

    public function executeQuery(string $query, array $params)
    {
        try {
            $statement = $this->database->conn->prepare($query);
            $statement->execute($params);
            return $statement;
        } catch (\PDOException $e) {
            // Log the full error details
            error_log("Database operation failed: " . $e->getMessage());


            $errorMessage = htmlspecialchars($e->getMessage(), ENT_QUOTES, 'UTF-8');

            echo <<<HTML
            <div style="
                display: flex; 
                justify-content: center; 
                align-items: center; 
                font-family: Arial, sans-serif;
                overflow: hidden;
                height: 99%;
            ">
                <div style="
                    border: 1px solid black; 
                    padding: 20px; 
                    border-radius: 5px; 
                    max-width: 800px;
                    width: 90%;
                    max-height: 80vh;
                    overflow-y: auto;
                    background-color: #f8f8f8;
                ">
                    <h2 style="
                        color: #d32f2f; 
                        margin-top: 0;
                    ">Error Occurred</h2>
                    <pre style="
                        white-space: pre-wrap;
                        word-wrap: break-word;
                        font-size: 24px;
                        line-height: 1.5;
                        margin: 0;
                    ">{$errorMessage}</pre>
                </div>
            </div>
            HTML;
            die();


        }
    }





}

