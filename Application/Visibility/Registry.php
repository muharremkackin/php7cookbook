<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Visibility;


class Registry
{

    protected static $instance = null;
    protected $registry = array();
    private function __construct()
    {
        // nobody can create instance of this class
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function __get($key)
    {
        return $this->registry[$key] ?? null;
    }

    public function __set($key, $value)
    {
        $this->registry[$key] = $value;
    }

}