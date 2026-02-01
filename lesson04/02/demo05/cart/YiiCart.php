<?php

namespace lesson04\example2\demo05\cart;

use Yii;

class YiiCart extends Cart
{
    public $sesionKey = 'cart';

    protected function loadItems()
    {
        if($this->items === null) {
            $this->items = Yii::$app->session->get($this->sesionKey, []);
        }
    }

    protected function saveItems()
    {
        Yii::$app->session->set($this->sesionKey, $this->items);
    }
}