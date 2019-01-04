<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

define('DB_CONFIG_FILE', '/../data/config/db.config_static.php');
require_once __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . '/..');

$connection = \Application\Database\StaticConnection::factory(include __DIR__ . DB_CONFIG_FILE);

$stmt = $connection->query('SELECT name FROM iso_country_codes');
while ($country = $stmt->fetch(PDO::FETCH_COLUMN)) {
    echo $country . PHP_EOL;
}