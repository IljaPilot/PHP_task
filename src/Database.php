<?php

class Database
{

    protected static $db;
    protected static $connection;


    protected function __construct()
    {

    }

    public static function getInstance()
    {
        if (!self::$db) {
            self::$db = new self();
        }

        return self::$db;
    }

    public function getConnection()
    {
        if (!self::$connection) {
            self::createConnection();
        }

        return self::$connection;
    }

    protected static function createConnection()
    {
        try {
            $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

            if ($mysqli->connect_error) {
                die("Connection failed: " . $mysqli->connect_error);
            }

            self::$connection = $mysqli;

        } catch (\Exception $e) {
            self::createDatabase();
            self::createConnection();
        }
    }

    protected static function createDatabase()
    {
        // Create connection
        $connection = new mysqli(DB_HOST, DB_USER, DB_PASS);
        // Check connection
        if ($connection->connect_error) {
            die("Connection failed: " . $connection->connect_error);
        }

        // Create database
        $sqlDB = "CREATE DATABASE IF NOT EXISTS " . DB_NAME;
        if ($connection->query($sqlDB) === true) {
            echo "Database: " . DB_NAME . " created successfully<br>";
        } else {
            echo "Error creating database: " . $connection->error . "<br>";
        }
    }

    public function createTable()
    {
        $connection = $this->getConnection();
        $sqlTable = "CREATE TABLE IF NOT EXISTS " . ProductType::TABLE_NAME . "(
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(255) NOT NULL
        )";

        if ($connection->query($sqlTable) === true) {
            echo "Table 1 product_types created successfully<br>";
        } else {
            echo "Error creating table 1 : " . $connection->error . "<br>";
        }

        $sqlTable = "CREATE TABLE IF NOT EXISTS " . Catalog::TABLE_NAME . " (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
        title VARCHAR(255) NOT NULL,
        price VARCHAR(255) NOT NULL,
        sizeText VARCHAR(255) NULL,
        sizeNum INT(11) NULL,
        material VARCHAR(255) NULL,
        manufacturer VARCHAR(255) NULL,
        categoryId INT(11)  NOT NULL
        )";

        if ($connection->query($sqlTable) === true) {
            echo "Table 2 attributes created successfully<br>";
        } else {
            echo "Error creating table 2 : " . $connection->error . "<br>";
        }
    }

}
