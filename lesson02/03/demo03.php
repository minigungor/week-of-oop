<?php

namespace lesson02\example3\demo03;

class StringHellper
{
    public static function toUpperCase($string)
    {
        return mb_strtoupper($string, 'UTF-8');
    }

    public static function toLowerCase($string)
    {
        return mb_strtolower($string, 'UTF-8');
    }
}


echo StringHellper::toUpperCase('Vasya') . PHP_EOL;
echo StringHellper::toLowerCase('Vasya') . PHP_EOL;

