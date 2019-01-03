<?php

define("DEFAULT_URL", 'https://oreilly.com');
define('DEFAULT_TAG', 'a');

function dd($variable) {
    echo json_encode($variable);
}

require_once __DIR__ . "/../Application/Autoload/Loader.php";

\Application\Autoload\Loader::init(__DIR__ . '/..');

$hoover = new \Application\Web\Hoover();

$url = strip_tags($_GET['url'] ?? DEFAULT_URL);
$tag = strip_tags($_GET['tag'] ?? DEFAULT_TAG);

echo 'Dump of Tags: ' . PHP_EOL;

dd($hoover->getAttribute($url, 'href'));
