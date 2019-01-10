<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

require_once __DIR__ . "/../Application/Autoload/Loader.php";
\Application\Autoload\Loader::init(__DIR__ . '/..');

function printMatrix(array $matrix) {
    foreach ($matrix as $row) {
        echo "| ";
        foreach ($row as $column) {
            echo $column . " ";
        }
        echo " |<br>";
    }
}

$matrix = [
    [1,1,0,1],
    [0,1,1,0],
    [1,0,0,1],
    [1,0,0,1]
];

$passThrough = \Application\Math\Warshall::passThrough($matrix);

printMatrix($passThrough);