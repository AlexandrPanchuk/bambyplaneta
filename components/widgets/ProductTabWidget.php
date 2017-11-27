<?php

namespace app\components\widgets;


use app\models\Product;
use yii\base\Widget;

class ProductTabWidget extends Widget
{
    public $product;

    public function init()
    {
        if (empty($this->product)) {
            throw new \InvalidArgumentException('product parameter cannot be empty');
        }
    }

    public function run()
    {
        $otherProducts = Product::find()
            ->where(['category_id' => $this->product->category->id])
            ->andWhere('id <> :id', ['id' => $this->product->id])
            ->limit(4)
            ->all();

        return $this->render('product_tab', ['product' => $this->product, 'otherProducts' => $otherProducts]);
    }

}