<?php

define('MASSIVE_FILE', '/../data/files/war_and_peace.txt');

require_once __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . "/..");

try {
    $largeFile = new \Application\Iterator\LargeFile(__DIR__ . MASSIVE_FILE);
    $iterator = $largeFile->getIterator('ByLine');
    $words = 0;
    foreach ($iterator as $line) {
//        echo $line;
        $words += str_word_count($line);
    }
    echo str_repeat('-', 52) . PHP_EOL;
    echo $words . PHP_EOL;
} catch (Throwable $throwable) {
    echo $throwable->getMessage();
}