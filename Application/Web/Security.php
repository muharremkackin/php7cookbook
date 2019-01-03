<?php
/**
 * Created by PhpStorm.
 * User: ALKU
 * Date: 31.12.2018
 * Time: 05:00
 */

namespace Application\Web;


class Security
{

    private $filter;
    private $validate;

    public function __construct()
    {
        $this->filter = [
            'striptags' => function ($a) { return strip_tags($a); },
            'digits' => function ($a) { return preg_replace('/[^0-9]/', '', $a); },
            'alpha' => function ($a) { return preg_replace('/[A-Z]/i', '', $a); }
        ];
        $this->validate = [
            'alnum' => function ($a) {return ctype_alnum($a); },
            'digits' => function ($a) {return ctype_digit($a); },
            'alpha' => function ($a) {return ctype_alpha($a); },
        ];
    }

    public function __call($name, $arguments)
    {

        preg_match('/^(filter|validate)(.*?)$/i', $name, $matches);
//        var_dump($matches);
        $prefix = $matches[1] ?? '';
        $function = strtolower($matches[2] ?? '');
        if ($prefix && $function) {
            return $this->$prefix[$function]($arguments[0]);
        }
        return false;
    }


}