<?php

//This is needed to turn off missing DB error. 
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

include('autoload.php');

define('DB_NAME', 'product_catalog');
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASS', '');

$database = Database::getInstance();

$database->createTable();


$types = new ProductType();

$types->insertType('Furniture');
$types->insertType('CD/DVD disks');

$catalog = new Catalog();

$catalog->InsertAttr('chair', '20', '1.5 x 0.6 x 0.6', 'NULL', 'plastic', 'NULL', '1');
$catalog->InsertAttr('table', '60', '1.2 x 1 x 2', 'NULL', 'wood', 'NULL', '1');
$catalog->InsertAttr('chair', '30', '1.5 x 0.6 x 0.6', 'NULL', 'wood', 'NULL', '1');

$catalog->InsertAttr('CD', '2','NULL', '700', 'NULL', 'China', '2');
$catalog->InsertAttr('DVD', '5','NULL', '1400', 'NULL', 'USA', '2');
$catalog->InsertAttr('CD-R', '4','NULL', '1400', 'NULL', 'China', '2');
