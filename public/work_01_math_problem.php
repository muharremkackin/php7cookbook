<?php

define("DATA", '../data/files/data_structures.txt');

require_once __DIR__ . "/../Application/Autoload/Loader.php";

\Application\Autoload\Loader::init(__DIR__ . "/..");

$math = new \Application\DataStructures\MathProblem(DATA);

echo $math->getMinimum();