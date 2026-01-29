<?php

namespace lesson02\example3\demo01;

function toUpperCase($string)
{
    return mb_strtoupper($string, 'UTF-8');
}

echo toUpperCase('Vasya') . PHP_EOL;

