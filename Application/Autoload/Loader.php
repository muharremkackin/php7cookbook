<?php
/**
 * Created by PhpStorm.
 * User: ALKU
 * Date: 25.12.2018
 * Time: 16:59
 */

namespace Application\Autoload;


use Exception;

class Loader
{

    private static $dirs = [];
    private static $registered = 0;
    const UNABLE_TO_LOAD = "Unable to Load";

    protected static function loadFile($file) {
        if (file_exists($file)) {
            require_once $file;
            return true;
        }
        return false;
    }

    public static function autoload($class) {
        $success = false;
        $fn = str_replace("\\", DIRECTORY_SEPARATOR, $class) . ".php";
        foreach (self::$dirs as $start) {
            $file = $start . DIRECTORY_SEPARATOR . $fn;
            if (self::loadFile($file)) {
                $success = true;
                break;
            }
        }
        if (!$success) {
//            try {
//                self::loadFile(__DIR__ . DIRECTORY_SEPARATOR . $fn);
//            } catch (Exception $exception) {
//                var_dump($exception);
//            }
            if (!self::loadFile(__DIR__ . DIRECTORY_SEPARATOR . $fn)) {
                throw new Exception(self::UNABLE_TO_LOAD . ' ' . $class);
            }
        }
        return $success;
    }

    public static function addDirs($dirs) {
        if (is_array($dirs)) {
            self::$dirs = array_merge(self::$dirs, $dirs);
        } else {
            self::$dirs[] =  $dirs;
        }
    }

    public static function init($dirs = array()) {
        if ($dirs) {
            self::addDirs($dirs);
        }
        if (self::$registered == 0) {
            spl_autoload_register(__CLASS__ . "::autoload");
            self::$registered++;
        }
    }

    public function __construct($dirs = array())
    {
        self::init($dirs);
    }

}