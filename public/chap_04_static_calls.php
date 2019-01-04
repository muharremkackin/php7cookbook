<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

require_once  __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . '/..');

echo \Application\OOP\StaticCall::$name . PHP_EOL;
echo \Application\OOP\ChildStaticCall::$name . PHP_EOL;
\Application\OOP\StaticCall::setName('Freddy Mercury');
echo \Application\OOP\StaticCall::getName() . PHP_EOL;
\Application\OOP\ChildStaticCall::setName('Charmender');
echo \Application\OOP\ChildStaticCall::getName() . PHP_EOL;
