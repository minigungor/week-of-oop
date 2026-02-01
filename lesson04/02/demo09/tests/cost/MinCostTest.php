<?php

namespace lesson04\example2\demo09\tests\storage;

use lesson04\example2\demo09\cart\cost\BirthdayCost;
use lesson04\example2\demo09\cart\cost\MinCost;
use lesson04\example2\demo09\tests\cost\DummyCost;
use PHPUnit\Framework\TestCase;

class MinCostTest extends TestCase
{
    public function testMin()
    {
        $calc = new MinCost(new DummyCost(100), new DummyCost(80), new DummyCost(90));
        $this->assertEquals(80, $calc->getCost([]));
    }
}