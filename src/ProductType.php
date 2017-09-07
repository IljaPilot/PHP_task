<?php

class ProductType
{
    const TABLE_NAME = 'product_type';

    public function insertType($title)
    {
        $connection = Database::getInstance()->getConnection();

        $sqlTypes = "INSERT INTO " . self::TABLE_NAME . " (`title`) VALUES ('$title')";

        if ($connection->query($sqlTypes) === true) {
            echo "Type " . $title . " created successfully<br>";
        } else {
            echo "Error creating type: " . $connection->error . "<br>";
        }
    }
}
