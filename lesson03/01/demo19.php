<?php

namespace lesson03\example1\demo19;

abstract class Base
{
    public function first()
    {
        return 'first . ' . $this->second();
    }

}

class Sub1 extends Base
{
    protected function second()
    {
        return 'second_1';
    }
}

class Sub2 extends Base
{
    protected function second()
    {
        return 'second_2';
    }
}

$sub1 = new Sub1();
echo $sub1->first() . PHP_EOL;

$sub2 = new Sub2();
echo $sub2->first() . PHP_EOL;
