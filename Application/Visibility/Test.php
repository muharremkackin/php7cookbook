<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey
 */

namespace Application\Visibility;


class Test
{

    public const TEST_WHOLE_WORLD = 'visible in everywhere';
    protected const TEST_INHERITED = 'visible in child classes';
    private const TEST_LOCAL = 'local to class Test only';

    public static function getTestInherited()
    {
        return self::TEST_INHERITED;
    }

    public static function getTestLocal() {
        return static::TEST_LOCAL;
    }

}