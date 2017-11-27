<?php
use app\components\helper\PriceHelper;
use yii\helpers\Html;

$mainImage = $model->getImage();
?>
<div class="item active">
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                        <a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $model->id])?>">
                            <?=Html::img($mainImage->getUrl(), ['alt' => $model->name])?>
                        </a>
                    <h2><?= PriceHelper::from($model->price)?></h2>
                    <p><a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $model->id])?>"><?=$model->name?></a></p>
                    <button type="button" class="btn btn-default add-to-cart" data-id="<?=$model->id?>"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>
                </div>
            </div>
        </div>
    </div>
</div>

