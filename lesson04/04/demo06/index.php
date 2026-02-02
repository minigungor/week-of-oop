<?php

namespace lesson04\example4\demo05;

use lesson04\example4\cart\Cart;
use lesson04\example4\cart\cost\SimpleCost;
use lesson04\example4\cart\storage\SessionStorage;
use Pimple;

require __DIR__ . '/vendor/autoload.php';

###########

$container = new Pimple();

$container['cart.storage.session_key'] = 'cart';

$container['cart.storage.session'] = function (Pimple $container) {
    return new SessionStorage($container['cart.storage.session_key']);
};

$container['cart.calculator'] = function (Pimple $container) {
    return new SimpleCost();
};

$container['cart'] = $container->share(function (Pimple $container) {
    return new Cart(
        $container['cart.storage.session'],
        $container['cart.calculator']
    );
});

#############

$cart = $container['cart'];
$cart->add(1, 3, 100);
print_r($cart->getItems());

$cart2 = $container['cart'];
print_r($cart2->getItems());