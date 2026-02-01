<?php

namespace lesson04\example2\demo08\tests\cost;

use lesson04\example2\demo08\cart\CartItem;
use lesson04\example2\demo08\cart\cost\SimpleCost;
use PHPUnit\Framework\TestCase;

class SimpleCostTest extends TestCase
{
    public function testCalculator()
    {
        $calculator = new SimpleCost();
        $this->assertEquals(1000, $calculator->getCost([
            5 => new CartItem(5, 2, 200),
            7 => new CartItem(7, 4, 150),
        ]));
    }
}