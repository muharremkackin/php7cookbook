<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

require_once __DIR__ . "/../Application/Autoload/Loader.php";
\Application\Autoload\Loader::init(__DIR__ . '/..');

$customer = new \Application\Traits\Customer();
$customer->setId(100);
$customer->setName('Flinstones');
var_dump($customer);