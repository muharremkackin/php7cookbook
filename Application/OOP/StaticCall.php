<?php

namespace Application\OOP;


class StaticCall
{

    public static $name = 'Static Call';

    public static function getName()
    {
        return static::$name;
    }

    public static function setName(string $name)
    {
        static::$name = $name;
    }

}

class ChildStaticCall extends StaticCall {
    public static $name = 'Child Static Call';
}