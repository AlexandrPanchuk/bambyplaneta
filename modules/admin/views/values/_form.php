<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Value */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_id')
        ->dropDownList(\app\models\Product::find()->select(['name', 'id'])
        ->indexBy('id')
        ->column()) ?>

    <?= $form->field($model, 'attribute_id')
        ->dropDownList(\app\modules\admin\models\Attribute::find()->select(['name', 'id'])
        ->indexBy('id')
        ->column())
    ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
