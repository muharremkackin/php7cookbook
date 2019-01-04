<?php

define('DB_CONFIG_FILE', '/../data/config/db.config.php');

require_once __DIR__ . '/../Application/OOP/Test.php';
require_once __DIR__ . '/../Application/OOP/NameAddress.php';
require_once __DIR__ . '/../Application/Database/Connection.php';

$test = new Application\OOP\Test();

echo $test->getTest() . PHP_EOL;
echo $test->setTest('Olympus')->getTest() . PHP_EOL;

$name = new \Application\OOP\Name();
$address = new \Application\OOP\Address();

echo $name->setName('Muharrem Kaçkın')->getName() . PHP_EOL;
echo $address->setAddress('Alanya/Antalya')->getAddress() . PHP_EOL;

$connection = new \Application\Database\Connection(include __DIR__ . DB_CONFIG_FILE);

$sql    = 'SELECT * FROM iso_country_codes';
$stmt   = $connection->pdo->query($sql);
$row    = $stmt->fetch(PDO::FETCH_OBJ);
var_dump($row);

$obj = new StdClass();
$obj->name = 'Muharrem';
echo $obj->name;