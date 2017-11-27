<?php

use app\components\MenuWidget;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php
        //$form->field($model, 'parent_id')->textInput()

    ?>

    <?php //echo $form->field($model, 'parent_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(), 'id', 'name')) ?>

    <div class="form-group field-category-parent_id has-success">
        <label class="control-label" for="category-parent_id">Родительская категория</label>
        <select id="category-parent_id" class="form-control" name="Category[parent_id]" aria-invalid="false">
            <option value="0">Самостоятельная категория</option>
            <?= MenuWidget::widget(['tpl' => 'select', 'model' => $model])?>
        </select>
    </div>


    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_catalog')->dropDownList([
        0 => 'Не является',
        1 => 'Является',
    ]) ?>

    <h4>Главное фото</h4>
    <?php
    $img = $model->getImage();
    ?>

    <img src="<?=$img->getUrl()?>" alt="">

    <?= $form->field($model, 'image')->fileInput() ?>
    <a href="<?= Url::to(['category/update', 'id' => $model->id, 'del' => 'delete']) ?>" onclick="return confirm('Вы уверены?')" >Удалить</a>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Редактировать', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
