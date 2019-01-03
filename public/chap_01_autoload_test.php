<?php

require_once __DIR__ . "/../Application/Autoload/Loader.php";

\Application\Autoload\Loader::init(__DIR__ . '/..');

$test = new \Application\Test\TestClass();
echo $test->getTest();

$fake = new \Application\Test\FakeClass();
$fake->getTest();