<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

function __autoload($class) {
    echo "Argument Passed to Autoloader = $class\n";
    include __DIR__ . '/../' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
}

use Application\Entity\Name;
use Application\Entity\Address;
use Application\Entity\Profile;

$name = new Name();
$address = new Address();
$profile = new Profile();

var_dump($name);
var_dump($address);
var_dump($profile);