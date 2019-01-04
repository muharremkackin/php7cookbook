<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Interfaces;

use PDO;
use Exception;
use Application\Database\Connection;
use Application\Interfaces\ConnectionAwareInterface;

class ListFactory
{

    const ERROR_AWARE = 'Class must be Connection Aware';

    public static function factory(ConnectionAwareInterface $class, $dbParams) {
        try {
            if ($class instanceof ConnectionAwareInterface) {
                try {
                    $class->setConnection(new Connection($dbParams));
                    return $class;
                }catch (Exception $exception) {
                    echo $exception->getMessage() . PHP_EOL;
                }
            }
        }catch (Exception $exception) {
            echo  $exception->getMessage() . PHP_EOL
                . self::ERROR_AWARE . PHP_EOL;
        }
        return false;
    }


}