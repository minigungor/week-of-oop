<?php

namespace lesson04\example2\demo06\tests;

use lesson04\example2\demo06\cart\Cart;

use PHPUnit\Framework\TestCase;

class CartTest extends TestCase
{

    public function setUp(): void
    {
        $_SESSION = [];
    }

    public function testCreate()
    {
        $cart = new Cart();
        $this->assertEquals([], $cart->getItems());
    }

    public function testAdd()
    {
        $cart = new Cart();
        $cart->add(5, 3, 100);
        $this->assertEquals(1, count($items = $cart->getItems()));
        $this->assertNotNull($items[5]);
        $this->assertEquals(5, $items[5]->getId());
        $this->assertEquals(3, $items[5]->getCount());
        $this->assertEquals(100, $items[5]->getPrice());
    }

    public function testAddExist()
    {
        $cart = new Cart();
        $cart->add(5, 3, 100);
        $cart->add(5, 4, 100);
        $this->assertEquals(1, count($items = $cart->getItems()));
        $this->assertNotNull($items[5]);
        $this->assertEquals(7, $items[5]->getCount());
    }

    public function testRemove()
    {
        $cart  = new Cart();
        $cart->add(5, 3, 100);
        $cart->remove(5);
        $this->assertEquals([], $cart->getItems());
    }

    public function testClear()
    {
        $cart  = new Cart();
        $cart->add(5, 3, 100);
        $cart->clear();
        $this->assertEquals([], $cart->getItems());
    }

    public function testCost()
    {
        $cart = new Cart();
        $cart->add(5, 3, 100);
        $cart->add(5, 6, 100);
        $this->assertEquals(900, $cart->getCost());
    }
}