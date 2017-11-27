<?php
/**
 * Created by PhpStorm.
 * User: alexandr
 * Date: 06.11.17
 * Time: 13:14
 */

namespace app\components\widgets;


use app\models\Category;
use app\models\Product;
use yii\base\Widget;
use yii\data\Pagination;
use yii\web\HttpException;

class IndexCatalogWidget extends Widget
{

    public $category_id = [
        73, // спонж бьюти блендер
        68,
        78,
        88,
        85,
        91,
        77,
        79
    ];

    public function run()
    {
        $categories = $this->category_id;
        $catalog = Category::getDb()->cache(function () use ($categories) {
            return Category::find()->where(['id' => $this->category_id])->all();
        });

        if ($catalog === null) {
            throw new HttpException(404, 'not category');
        }
        return $this->render('index-catalog', ['catalog' => $catalog]);
    }


}