<?php

class Catalog
{

    const TABLE_NAME = 'catalog';
    const CATEGORY_CD = 2;
    const CATEGORY_FURNITURE = 1;

    public function InsertAttr($title, $price, $sizeText, $sizeNum, $material, $manufacturer, $categoryId)
    {

        $connection = Database::getInstance()->getConnection();

        //fore CD/DVD disks
        if ($categoryId == self::CATEGORY_CD) {
            $title = $title . " (" . $sizeNum . " MB)";

            $sqlAttr = "INSERT INTO " . self::TABLE_NAME . "
            (`title`, `price`, `sizeText`, `sizeNum`, `material`, `manufacturer`, `categoryId`) 
            VALUES ('$title', '$price', $sizeText, '$sizeNum', $material, '$manufacturer', '$categoryId')";
        }

        //fore furniture
        if ($categoryId == self::CATEGORY_FURNITURE) {

            $sqlAttr = "INSERT INTO " . self::TABLE_NAME . "
            (`title`, `price`, `sizeText`, `sizeNum`, `material`, `manufacturer`, `categoryId`) 
            VALUES ('$title', '$price', '$sizeText', $sizeNum, '$material', $manufacturer, '$categoryId')";
        }

        if ($connection->query($sqlAttr) === true) {
            echo "Product " . $title . " created successfully<br>";
        } else {
            echo "Error creating product: " . $connection->error . "<br>";
        }
    }
}
