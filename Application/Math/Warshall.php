<?php
/**
 * Copyright (c) Muharrem Kaçkın 2019.
 * PHP7CookBook Learn Journey 
 */

namespace Application\Math;


class Warshall
{
    protected static $matrix;

    public static function passThrough(array $matrix = [])
    {
        if (!empty($matrix)) {
            static::$matrix = $matrix;
        }

        $count = count(self::$matrix);

        for ($k = 0; $k < $count; $k++) {
            for ($i = 0; $i < $count; $i++) {
                for ($j = 0; $j < $count; $j++) {
                    if (self::$matrix[$i][$j] or (self::$matrix[$i][$k] and self::$matrix[$k][$j])) {
                        self::$matrix[$i][$j] = self::$matrix[$i][$j] or (self::$matrix[$i][$k] and self::$matrix[$k][$j]);
                    }
                }
            }
        }

        return self::$matrix;
    }
    
}