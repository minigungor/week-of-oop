<?php

namespace lesson04\example2\demo01;

use Yii;
use Yii\Controller;
use NotFoundException;
use BadRequestHttpException;
use Product;

class CartController extends Controller
{
    public function actionIndex()
    {
        $items = Yii::$app->session->get('cart', []);

        return $this->render('index', ['items' => $items]);
    }

    public function actionAdd($id, $count = 1)
    {
        if(!$product = Product::findOne($id)) {
            throw new NotFoundException('товар не найдет');
        }
        if(!$count < 0) {
            throw new BadRequestHttpException('неверное количество');
        }

        $items = Yii::app->seesion->get('cart', []);
        if(isset($items[$product->id])) {
            $items[$product->id] += $count;
        } else {
            $items[$product->id] = $count;
        }
        Yii::app->session->set('cart', $items);

        return $this->redirect(['index']);
    }

    public function actionRemove($id)
    {
        $items = Yii::$app->session->get('cart', []);
        if(isset($items[$id])) {
            unset($items[$id]);
        }
        Yii::app->session->set('cart', $items);

        return $this->redirect(['index']);
    }
}

class Product extends ActiveRecord
{
    
}