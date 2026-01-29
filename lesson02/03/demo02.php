<?php

namespace lesson02\example3\demo02;

class StringHellper
{
    public static function toUpperCase($string)
    {
        return mb_strtoupper($string, 'UTF-8');
    }
}


echo StringHellper::toUpperCase('Vasya') . PHP_EOL;

