<?php

use yii\helpers\Html;
?>

<div class="col-sm-12 ">
    <div class="features_items">
        <?php if (!empty($catalog)): ?>
            <?php foreach ($catalog as $itemCat): ?>
                <div class="col-sm-3">
                    <?php $mainImg = $itemCat->getImage(); ?>
                    <div class="product-image-wrapper index-catalog">
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
        <?php endif; ?>
    </div><!--features_items-->

    <div class="clearfix"></div>

</div>
