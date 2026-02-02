<?php

namespace lesson04\example4\demo01;

use lesson04\example4\cart\Cart;
use lesson04\example4\cart\cost\SimpleCost;
use lesson04\example4\cart\storage\SessionStorage;

require __DIR__ . '/vendor/autoload.php';

$cart = new Cart(new SessionStorage('cart'), new SimpleCost());
$cart->add(1, 3, 100);
print_r($cart->getItems());

