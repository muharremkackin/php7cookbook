<?php

function test() {
    return [
        1 => function () {
        return [
          1 => function ($a) { return 'Level 1/1:' . $a%2; },
          2 => function ($a) { return 'Level 1/2:' . $a%5; }
        ];
        },
        2 => function () {
        return [
            1 => function ($a) {return 'Level 2/1:' . $a%10; },
            2 => function ($a) {return 'Level 2/2:' . $a%20; }
        ];
        }
    ];
}

$a = 't';
$t = 'test';

$br = '<br>';

echo $$a()[1]()[2](97) . $br;
echo $$a()[1]()[1](95) . $br;
echo $$a()[2]()[1](64) . $br;
echo $$a()[2]()[2](71) . $br;