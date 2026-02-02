<?php

namespace lesson04\example4\demo09\example04;

use lesson04\example4\cart\Cart;
use Yii\web\Controller;

class CartController extends Controller
{
    private $cart;

    public function __construct($id, $module, Cart $cart, $config = [])
    {
        $this->cart = $cart;
        parent::__construct($id, $module, $config);
    }

    public function actionIndex()
    {
        return $this->cart->getItems();
    }

    public function actionAdd($id, $count, $price)
    {
        $this->cart->add($id, $count, $price);
        return 'ok';
    }
}