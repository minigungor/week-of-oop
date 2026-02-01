<?php

use lesson04\example2\demo07\cart\Cart;
use lesson04\example2\demo07\cart\storage\SessionStorage;

require_once __DIR__ . '/vendor/autoload.php';

$sessionStorage = new SessionStorage('cart');
$cart = new Cart($sessionStorage);

$cart->add(3, 5, 100);

echo $cart->getCost() . PHP_EOL;

