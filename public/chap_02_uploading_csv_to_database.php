<?php

define('DB_CONFIG_FILE', '/../data/config/db.config.php');
define('CSV_FILE', '/../data/files/user_information.csv');
require_once __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . '/..');

try {

    $connection = new \Application\Database\Connection(include __DIR__ . DB_CONFIG_FILE);
    $iterator = (new \Application\Iterator\LargeFile(__DIR__ . CSV_FILE))->getIterator('Csv');
    $sql = 'INSERT INTO `user_information` (first_name, last_name, email, gender, country) VALUES (?,?,?,?,?)';
    $statement = $connection->pdo->prepare($sql);

    $row = 1;
    foreach ($iterator as $data) {
//        if ($row == 1) {continue;}
//        PHP Max row is 1000
        $statement->execute($data);
        $row++;
    }

} catch (Throwable $exception) {
    echo $exception->getMessage();
}