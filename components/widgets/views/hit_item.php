<?php
use app\components\helper\PriceHelper;
use yii\helpers\Html;
?>
<div class="recommended_items">
    <h2 class="title text-center">Популярные товары</h2>
    <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php

            $count = count($model); $i = 0; foreach ($model as $hit): ?>
                <?php if ($i % 3 == 0): ?>
                    <div class="item <?php if ($i == 0) echo "active"?>">
                <?php endif; ?>

                <?php $mainImg = $hit->getImage(); ?>

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $hit->id])?>">
                                    <?=Html::img($mainImg->getUrl(), ['alt' => $hit->name])?>
                                </a>
                                <span class="price"><?= PriceHelper::from($hit['price'])?></span>
                                <p><a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $hit['id']])?>"><?=$hit['name']?></a></p>
                                <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php $i++; ?>
                <?php if ($i % 3 == 0 || $count == $i): ?>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
            <i class="fa fa-angle-left"></i>
        </a>
        <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
            <i class="fa fa-angle-right"></i>
        </a>
    </div>
</div>