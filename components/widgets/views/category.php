<?php

use app\components\helper\PriceHelper;
use yii\helpers\Html;
?>

<div class="col-sm-9 padding-right">
    <div class="features_items">
        <!--features_items-->
        <h2 class="title text-center"><?= $category['name']?></h2>

        <?php if (!empty($products)): ?>
            <?php $i = 0; foreach ($products as $product): ?>
                <?php $mainImg = $product->getImage(); ?>

                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <div style="widh: 300px; ">
                                    <a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $product->id])?>">
                                        
                                        <?=Html::img($mainImg->getUrl(), ['alt' => $product['name']])?>
                                       
                                    </a>
                                 </div>
                                 <div>
                                <?php if ($product->price): ?>
                                    <span class="price"><?= PriceHelper::from($product->price)?></span>
                                <?php endif; ?>
                                <p><a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $product->id])?>"><?=$product->name?></a>

                                </p>
                                <a href="<?=\yii\helpers\Url::to(['cart/add', 'id'=>$product->id])?>" data-id="<?=$product->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
                                </div>
                            </div>
                        </div>
                        <?php if ($product->new): ?>
                            <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class'=>'newarrival'])?>
                        <?php endif;?>

                        <?php if ($product->sale): ?>
                            <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class'=>'newarrival'])?>
                        <?php endif;?>
                    </div>
                </div>

                <?php $i++; ?>
                <?php if ($i % 3 == 0): ?>
                    <div class="clearfix"></div>
                <?php endif; ?>
            <?php  endforeach; ?>
        <?php elseif (!empty($catalog)): ?>
            <?php foreach ($catalog as $itemCat): ?>
                <div class="col-sm-4">

                    <?php $mainImg = $itemCat->getImage(); ?>
                    <div class="product-image-wrapper">
                        <div class="imagecatalog"><a href="<?=\yii\helpers\Url::to(['category/view', 'id' => $itemCat['id']])?>">
                                <?=Html::img($mainImg->getUrl('300x300'), ['alt' => $itemCat['name']])?>
                            </a>
                        </div>
                        <p>
                            <?=$itemCat['name']?>
                        </p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <h2>По данной категории товаров пока нет ...</h2>
        <?php endif; ?>
    </div><!--features_items-->

    <div class="clearfix"></div>
    <?=
    \yii\widgets\LinkPager::widget([
        'pagination' => $pages
    ])
    ?>
</div>
