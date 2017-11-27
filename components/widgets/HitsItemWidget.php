<?php
namespace app\components\widgets;
use app\models\Product;

class HitsItemWidget extends \yii\base\Widget
{
    const LIMIT = 6;

    public function init()
    {

    }

    public function run()
    {
        $model['model'] = $this->getItems();
        return $this->render('hit_item', $model);
    }

    public function getItems()
    {
        return Product::find()->where(['hit' => '1'])->limit(6)->all();
    }


}