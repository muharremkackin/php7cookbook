<?php

function dirScanExample($dir) {
//    set value static for doesn't changed when function call itself
    static $list = array();

    $list = glob($dir . DIRECTORY_SEPARATOR . '*');

    foreach ($list as $item) {
        if (is_dir($item)) {
            $list = array_merge($list, dirScanExample($item));
        }
    }
    foreach ($list as $key => $item) {
        $list[$key] = str_replace('\\', '/', $item);
    }
    return $list;
}

echo '<pre>', var_export(dirScanExample("C:/laragon/www/php7cookbook")), '</pre>';