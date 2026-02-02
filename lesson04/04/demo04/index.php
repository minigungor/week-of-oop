<?php

namespace lesson04\example4\demo03;

use lesson04\example4\cart\Cart;
use lesson04\example4\cart\cost\SimpleCost;
use lesson04\example4\cart\storage\SessionStorage;

require __DIR__ . '/vendor/autoload.php';

###########

class Container
{
    private $definitions = [];

    private $shared = [];

    public function set($id, $callback)
    {
        $this->shared[$id] = null;
        $this->definitions[$id] = [
            'cllback' => $callback,
            'shared' => false,
        ];
    }

    public function setShared($id, $callback)
    {
        $this->shared[$id] = null;
        $this->definitions[$id] = [
            'cllback' => $callback,
            'shared' => true,
        ];
    }

    public function get($id)
    {
        if(isset($this->shared[$id])) {
            return $this->shared[$id];
        }

        if(!array_key_exists($id, $this->definitions)) {
            throw new \Exception("$id is not defined");
        }

        $definition = $this->definitions[$id];
        $component = call_user_func($definition['cllback'], $this);
        if($definition['shared']) {
            $this->shared[$id] = $component;
        }
        return $component;

    }
}

#############

$container = new Container();

$container->set('cart.storage', function(Container $container) {
    return new SessionStorage('cart');
});

$container->set('cart.calculator', function(Container $container) {
    return new SimpleCost();
});

$container->set('cart', function(Container $container) {
    return new Cart(
        $container->get('cart.storage'),
        $container->get('cart.calculator')
    );
});

$container->setShared('cart', function(Container $container) {
    return new Cart(
        $container->get('cart.storage'),
        $container->get('cart.calculator')
    );
});

#############

$cart = $container->get('cart');
$cart->add(1, 3, 100);
print_r($cart->getItems());

$cart2 = $container->get('cart');
print_r($cart2->getItems());