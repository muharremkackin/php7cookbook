<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */


namespace Application\Database;

use PDO;
use PDOException;

class StaticConnection
{

    public static function factory(array $info)
    {

        $dsn = sprintf('%s:dbname=%s;host=%s;charset=%s;',
            $info['driver'],
            $info['dbname'],
            $info['host'],
            $info['charset']);
        try {
            return new PDO($dsn, $info['user'], $info['password'], $info['options']);
        } catch (PDOException $exception) {
            error_log($exception->getMessage());
        }

    }

}