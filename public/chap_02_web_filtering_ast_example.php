<?php

require_once __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . '/..');
$security = new Application\Web\Security();

$data = [
    '<ul><li>Lots</li><li>of</li><li>Tags</li></ul>',
    12345,
    'This is a string',
    'String with number 12345'
];

foreach ($data as $item) {
    echo 'ORIGINAL: ' . $item . PHP_EOL;
    echo 'FILTERING' . PHP_EOL;
    printf("%12s : %s" . PHP_EOL, 'Strip Tags', $security->filterStripTags($item));
    printf('%12s : %s' . PHP_EOL, 'Digits', $security->filterDigits($item));
    printf('%12s : %s' . PHP_EOL, 'Alpha', $security->filterAlpha($item));

    echo 'VALIDATORS' . PHP_EOL;
    printf('%12s : %s' . PHP_EOL, 'Alnum', ($security->validateAlnum($item)) ? 'T' : 'F');
    printf('%12s : %s' . PHP_EOL, 'Digits', ($security->validateDigits($item)) ? 'T' : 'F');
    printf('%12s : %s' . PHP_EOL, 'Alpha', ($security->validateAlpha($item)) ? 'T' : 'F');

}

$foo = new class {
    public $baz = ['bada' => 'boom'];
};

var_dump($foo);