<?php

use app\modules\admin\models\Product;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <a href="<?=\yii\helpers\Url::to(['/product/view', 'id' => $model->id])?>">
    <h1><?= Html::encode($this->title)?></h1>
    </a>
    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php
        $img = $model->getImage();
    ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
//            'category_id',
            [
                'attribute' => 'category_id',
                'value' => function($data){
                    return $data->getCategoryName();
                }
            ],
            'name',
            'alias',
            'content:html',
            'price',
            'keywords',
            'description',
            [
                'attribute' => 'image',
                'value' => "<img src='".$img->getUrl()."'>",
                'format' => 'html'
            ],
            'hit:boolean',
            'new:boolean',
            'sale:boolean',
            [
                'label' => 'Tags',
                'filter' => \app\modules\admin\models\Tag::find()->select(['name', 'id'])->indexBy('id')->column(),
                'value' => function (Product $product) {
                    return implode(', ', ArrayHelper::map($product->tags, 'id', 'name'));
                }
            ],
        ],
    ]) ?>

    <?php ?>

    <p>
        <?=Html::a('Добавить атрибут', ['values/create', 'product_id' => $model->id], ['class' => 'btn btn-primary'])?>
    </p>

    <?= GridView::widget([
        'dataProvider' => new \yii\data\ActiveDataProvider(['query' => $model->getValues()->with('productAttribute')]),
        'columns' => [
            'product_id',
            [
                'attribute' => 'attribute_id',
                'value' => 'productAttribute.name'
            ],
            'value',
            [
                'class' => 'yii\grid\ActionColumn',
                'controller' => 'values'
            ],

        ]

    ]) ?>


</div>
