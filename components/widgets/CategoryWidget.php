<?php

namespace app\components\widgets;

use app\models\Category;
use app\models\Product;
use yii\base\Widget;
use yii\data\Pagination;
use yii\web\HttpException;

class CategoryWidget extends Widget
{

    public $category_id;


    public function init()
    {
        parent::init();
    }

    public function run()
    {

        $category = Category::findOne(['id' => $this->category_id]);

        if ($category === null) {
            throw new HttpException(404, 'not category');
        }

        $query = Product::find()->where(['category_id' => $this->category_id])->orderBy('hit');
        $pages = new Pagination([
            'totalCount' => $query->count(),
            'pageSize' => 9,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);
        $products = $query->offset($pages->offset)->limit($pages->limit)->all();

        $catalog = Category::find()->where(['parent_id' => $this->category_id, 'is_catalog' => 1])->all();

        return $this->render('category', ['pages' => $pages, 'category' => $category, 'products' => $products, 'catalog' => $catalog]);
    }


}