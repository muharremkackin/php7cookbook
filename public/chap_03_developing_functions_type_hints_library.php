<?php

declare(strict_types=1);

function typeHintExample(Array $a, DateTime $t, Callable $c) {
    $message = '';
    $message .= 'Array Count: ' . count($a) . PHP_EOL ;
    $message .= 'Date: ' . $t->format('Y-m-d') . PHP_EOL;
    $message .= 'Callable: ' . $c() . PHP_EOL;
    return $message;
}

function scalarHintExample(bool $b, int $i, float $f, string $s) {
    return sprintf(
      PHP_EOL . "%20s : %5s" . PHP_EOL . "%20s : %5d" . PHP_EOL .
      "%20s : %5.2f" . PHP_EOL . "%20s : %20s" . PHP_EOL . PHP_EOL,
        'Boolean', ($b ? 'TRUE': 'FALSE'),
        'Integer', $i,
        'Float', $f,
        'String', $s
    );
}

function boolHintExample(bool $b) {
    return $b;
}