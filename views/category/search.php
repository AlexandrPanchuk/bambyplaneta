<?php
/* @var $this yii\web\View */
$this->title = 'Поиск';
use app\components\helper\PriceHelper;
use yii\helpers\Html;
?>

<!--<section id="advertisement">-->
<!--    <div class="container">-->
<!--        <img src="/images/shop/advertisement.jpg" alt="" />-->
<!--    </div>-->
<!--</section>-->

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h2>Меню категорий</h2>
                    <ul class="catalog category-products">
                        <?= \app\components\MenuWidget::widget(['tpl' => 'menu']) ?>
                    </ul>
                    <!--/category-products-->

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center"> Поиск по запросу: <?=Html::encode($queryUser)?></h2>

                    <?php if (!empty($products)): ?>
                        <?php foreach ($products as $product): ?>
                            <?php
                                $imgMain = $product->getImage();
                            ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <?=Html::img($imgMain->getUrl(), ['alt' => $product->name])?>
                                            <?php if ($product->price): ?>
                                                <h2><?= PriceHelper::from($product->price)?></h2>
                                            <?php endif; ?>
                                            <p><a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $product->id])?>"><?=$product->name?></a>

                                            </p>
                                            <a href="<?=\yii\helpers\Url::to(['cart/add', 'id'=>$product->id])?>" data-id="<?=$product->id?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавить в корзину</a>
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
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class="not-search">
                        <h4><span> Извините, но по вашему запросу ничего не найдено! <br> Попробуйте изменить условия поиска.</span></h4>
                        </div>
                        <?php endif; ?>
                </div><!--features_items-->

                <div class="clearfix"></div>

                <?php if ($pages): ?>
                <?= \yii\widgets\LinkPager::widget([
                    'pagination' => $pages
                ]) ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>