<?php

define('LOG_FILES', 'C:/laragon/bin/apache/httpd-2.4.35-win64-VC15/logs/*access*.log');
require_once __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . '/..');

$freq = function ($line) {
    $ip = $this->getIp($line);
    if ($ip) {
        echo ".";
        $this->frequency[$ip] = (isset($this->frequency[$ip])) ? $this->frequency[$ip] + 1 : 1;
    }
};

foreach (glob(LOG_FILES) as $filename) {
    echo PHP_EOL . $filename . PHP_EOL;
    $access = new \Application\Web\Access($filename);
    foreach ($access->fileIteratorByLine() as $line) {
        $freq->call($access, $line);
    }
}

arsort($access->frequency);
foreach ($access->frequency as $key => $value) {
    printf('%16s : %6d' . "<br>", $key, $value);
}