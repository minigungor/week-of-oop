<?php

namespace lesson03\example1\demo20;

final class Base
{
    public function first()
    {
        return 'first';
    }
}

class Sub1
{
    final protected function second()
    {
        return 'second';
    }
}

class Sub2 extends Sub1
{
    protected function third()
    {
        return 'third';
    }
}

$sub1 = new Sub1();

echo $sub1->first() . PHP_EOL;

$sub2 = new Sub2();

echo $sub2->first() . PHP_EOL;