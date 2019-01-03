<?php

function infinite_function(...$params) {
    return var_export($params, true);
}

echo '<pre>', infinite_function("hello","world","for","infinite","possibility"), '<pre>';