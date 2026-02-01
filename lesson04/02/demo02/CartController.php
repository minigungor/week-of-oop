<?php

namespace lesson04\example2\demo02;

use lesson04\example2\demo01\Product;
use Yii;
use Yii\Controller;
use NotFoundException;
use BadRequestHttpException;
use Product;

class CartController extends Controller
{
    public function actionIndex()
    {
        $items = Yii::$app->cart->getItems();

        return $this->render('index', ['items' => $items]);
    }

    public function actionAdd($id, $count = 1)
    {
        $product = $this->findModel($id);

        Yii::$app->cart->add($product->id, $count);

        return $this->redirect(['index']);
    }
    public function actionRemove($id)
    {
        Yii::$app->cart->remove($id);

        return $this->redirect(['index']);
    }
    private function findModel($id)
    {
        if(!$product = Product::findOne($id)) {
            throw new NotFoundHttpException('Товар не найден');
        }
        return $product;
    }
}

class Product extends ActiveRecord
{

}