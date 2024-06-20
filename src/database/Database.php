<?php
// src/Database/Database.php

namespace App\Database;

use PDO;
use PDOException;

class Database
{
    private $connection;

    public function __construct()
    {
        // Load the configuration file
        $config = include __DIR__ . '/../../config/db.php'; // Adjust the path as necessary
        $this->connect($config);
    }

    private function connect($config)
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4";

        try {
            $this->connection = new PDO(
                $dsn,
                $config['user'],
                $config['password'],
                $config['options']
            );
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    public function getConnection()
    {
        return $this->connection;
    }

    public function query($sql, $params = [])
    {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}
