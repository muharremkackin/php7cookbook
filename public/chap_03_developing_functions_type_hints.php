<?php

include __DIR__ . DIRECTORY_SEPARATOR . 'chap_03_developing_functions_type_hints_library.php';

try {
    $callable = function () { return 'Callback Return'; };
    echo typeHintExample([1,2,3], new DateTime(), $callable);
    echo typeHintExample('A', 'B', 'C');
} catch (TypeError $error) {
    echo $error->getMessage() . PHP_EOL;
}

try {
    echo scalarHintExample(true,11,22.22,'This is a string');
    echo scalarHintExample('A', 'B', 'C', 'D');
} catch (TypeError $error) {
    echo $error->getMessage() . PHP_EOL;
}

try {
    $b = boolHintExample(true);
    $i = boolHintExample(11);
    $f = boolHintExample(22.22);
    $s = boolHintExample('X');
    var_dump($b, $i, $f, $s);
    $b = boolHintExample(false);
    $i = boolHintExample(0);
    $f = boolHintExample(0.0);
    $s = boolHintExample('');
    var_dump($b,$i,$f,$s);
} catch (TypeError $error) {
    echo $error->getMessage();
}

try {
    $a = boolHintExample([1,2,3]);
    var_dump($a);
} catch (TypeError $error) {
    $error->getMessage();
}

try {
    $o = boolHintExample(new stdClass());
    var_dump($o);
} catch (TypeError $error) {
    echo $error->getMessage();
}