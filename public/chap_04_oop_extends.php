<?php

require_once __DIR__ . '/../Application/Autoload/Loader.php';
\Application\Autoload\Loader::init(__DIR__ . '/..');

use Application\OOP\Base;
use Application\OOP\Customer;
use Application\OOP\Member;
use Application\OOP\Orphan;

$customer = new Customer();
$customer->setId(100);
$customer->setName('Fred');

echo "Customer [id] : {$customer->getName()} [{$customer->getId()}]" . PHP_EOL;
echo ($customer->validate()) ? 'VALID' : 'NOT VALID' . PHP_EOL;

//$customer->setId('XYZ');
//$customer->setName('$%&€*()');
//
//echo "Customer [id] : {$customer->getName()} [{$customer->getId()}]" . PHP_EOL;
//echo ($customer->validate()) ? 'VALID' : 'NOT VALID' . PHP_EOL;

$member = new Member();
$member->setId(100);
$member->setName("Lucy");
$member->setMembership('A235B33A7');

var_dump($member);


function test(Base $object) {
    return $object->getId();
}

$base = new Customer();

$base->setId(100);

echo test($base) .PHP_EOL;

$objects = [
    (new Customer())->setId(100),
    (new Customer())->setId(101),
    (new Customer())->setId(102),
    (new Customer())->setId(103),
    (new Customer())->setId(104),
    (new Customer())->setId(105),
];

foreach ($objects as $object) {
    echo $object->getId() . PHP_EOL;
}

try {
    $orphan = new Orphan();
    $orphan->setId(100);
    echo test($orphan);
}catch (TypeError $typeError) {
    echo $typeError->getMessage();
}

