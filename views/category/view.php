<?php
/* @var $this yii\web\View */
//$this->title = 'Товары категории';
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
                    <div class="nestedsidemenu">
                        <ul>
                            <?php if ($this->beginCache('category-menu-widget-header', [
                                    'duration' => 3600,
                                    'variations' => $id
                            ])): ?>
                            <?= \app\components\NewMenuWidget::widget(['tpl' => 'new_menu']) ?>
                            <?php $this->endCache(); endif; ?>
                        </ul>
                    </div>
                    <!--/category-products-->

                </div>
            </div>

            <?= \app\components\widgets\CategoryWidget::widget(['category_id' => $id]) ?>

        </div>
    </div>
</section>