<?php

namespace lesson04\example4\demo07;

use lesson04\example4\cart\storage\SessionStorage;
use lesson04\example4\cart\Cart;
use yii\di\Container;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/vendor/yiisoft/yii2/Yii.php';

###########

$container = new Yii::$container();

$container('lesson04\example4\cart\storage\StorageInterface', function (Container $container) {
    return new SessionStorage('cart');
});

$container->set('lesson04\example4\cart\cost\CalculatorInterface', 'lesson04\example4\cart\cost\SimpleCost');

$container->setSingleton('lesson04\example4\cart\Cart');

#########


$cart = $container->get('lesson04\example4\cart\Cart');
$cart->add(1, 3, 100);
print_r($cart->getItems());