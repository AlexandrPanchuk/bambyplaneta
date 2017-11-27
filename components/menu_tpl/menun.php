<li class="<?php if (isset($category['childs'])) { echo 'has-sub dcjq-parent-li';} else { echo 'this';} ?>">

    <?php if (isset($category['childs'])): ?>
        <a style="cursor: pointer" class="dcjq-parent"><?=$category['name']?></a>
    <?php else: ?>

        <a href="<?= \yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>"
           class="<?php if (isset($category['childs'])) { echo 'dcjq-parent';} ?>" style="cursor: pointer">
            <?=$category['name']?>
        </a>
    <?php  endif;?>

    <?php if (isset($category['childs'])): ?>
        <ul class="sub-menumob">
            <?=$this->getMenuHtml($category['childs'])?>
        </ul>
    <?php endif; ?>
</li>
