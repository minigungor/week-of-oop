<?php

namespace lesson03\example1\demo16;

class Super
{
    public static function second()
    {
        return 'second_0';
    }
}

class Base extends Super
{
    public static function first()
    {
        return 'first + ' . self::second();
    }

}

class Sub extends Base
{
    public static function second()
    {
        return 'second_2';
    }
}


$base = new Base();
echo $base->first() . PHP_EOL;

$sub = new Sub();
echo $sub->first() . PHP_EOL;