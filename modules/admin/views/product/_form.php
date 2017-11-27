<?php

use app\components\MenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
mihaildev\elfinder\Assets::noConflict($this);



/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin([
            'options' => [
                    'enctype' => 'multipart/form-data'
            ]]); ?>

    <div class="form-group field-product-category_id has-success">
        <label class="control-label" for="product-category_id">Родительская категория</label>
        <select id="product-category_id" class="form-control" name="Product[category_id]" aria-invalid="false">
            <?= MenuWidget::widget(['tpl' => 'select_product', 'model' => $model])?>
        </select>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?=
        $form->field($model, 'content')->widget(CKEditor::className(), [
            'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
                    'preset' => 'full'
            ]),
        ])
    ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'size')->radioList(\app\modules\admin\models\Product::getSize() ,[
        'item' => function($index,$label,$name,$checked,$value){
            return Html::radio($name,
                $checked,
                [
                    'label' => $label,
                    'value' => $value,
                    'labelOptions' => ['class' => 'niceInput']
                ]);

        }
    ]) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'predestination')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <h4>Главное фото</h4>
    <?php
        $img = $model->getImage();
    ?>

    <img src="<?=$img->getUrl()?>" alt="">
    <hr>
    <?php
        $gallery = $model->getImages();
    ?>
    <hr>
    <h4>Галерея</h4>
    <?php $count = count($gallery); $i = 0; foreach ($gallery as $img): ?>
        <?php if ($i % 3 == 0): ?>
            <div class="item <?php if ($i == 0) echo 'active'?>">
        <?php endif;  ?>
        <a href="<?=\yii\helpers\Url::to($img->getUrl())?>"
           class='lightview'
           data-lightview-group='example'>
            <?=Html::img($img->getUrl('100*100'), ['alt' => ''])?></a>

        <?php $i++; if ($i % 3 == 0 || $i==$count): ?>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>
    <hr>


    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'gallery[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>

    <?= $form->field($model, 'hit')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'new')->checkbox([ '0', '1', ]) ?>

    <?= $form->field($model, 'sale')->checkbox([ '0', '1', ]) ?>



    <a href="<?= Url::to(['product/update', 'id' => $model->id, 'del' => 'delete']) ?>" onclick="return confirm('Вы уверены?')" >Удалить главное фото</a>
    <br>
    <a href="<?= Url::to(['product/update', 'id' => $model->id, 'galleryDel' => 'delete']) ?>" onclick="return confirm('Вы уверены?')" >Удалить галерею</a>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
