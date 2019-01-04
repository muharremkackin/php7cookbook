<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

define('DB_CONFIG_FILE', '/../data/config/db.config.php');
require_once __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . '/..');
$params = include __DIR__ . DB_CONFIG_FILE;

$list = \Application\Interfaces\ListFactory::factory(new \Application\Interfaces\CountryList(), $params);
foreach ($list->list() as $item) {
    echo $item . PHP_EOL;
}

$list = \Application\Interfaces\ListFactory::factory(
    new \Application\Interfaces\CustomerList(), $params
);
foreach ($list->list() as $item) {
    echo $item . PHP_EOL;
}