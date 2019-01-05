<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

require_once __DIR__ . "/../Application/Autoload/Loader.php";
\Application\Autoload\Loader::init(__DIR__ . '/..');

$idName = new \Application\Traits\IdName();
$idName->setId(100);
$idName->setName('Murdock');
$idName->setKey();

var_dump($idName);

$idName->setKeyDate();

var_dump($idName);