<?php

namespace app\controllers;

use app\models\Category;
use app\models\Product;
use Yii;
use yii\helpers\Url;
use yii\web\HttpException;

class ProductController extends AppController
{

    public function actionView($id)
    {

        $product = Product::getDb()->cache(function () use ($id) {
           return Product::findOne($id);
        });

        if ($product === null) {
            throw new HttpException(404, 'not product from address');
        }

        $this->setMeta(
            $product->name.' - купить в Киеве по цене '.$product->price.' грн',
            '',
            'Ваш интернет шоппинг — '.$product->name.' по цене '.$product->price.' грн., звоните ☎ +38 (063) 314-89-62');

        $this->view->params['breadcrumbs'] = [
            ['label' => $product->category->name, 'url' => Url::to(['category/view', 'id'=>$product->category->id])],
            ['label' => $product->name]
        ];

        return $this->render('view', compact('product'));
    }



}