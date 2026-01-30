<?php

namespace lesson03\example1\demo15;

class Base
{

    public function first()
    {
        return 'first + ' . self::second();
    }

    public static function second()
    {
        return 'second_1';
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