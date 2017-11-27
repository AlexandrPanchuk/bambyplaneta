<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Order */

$this->title = 'Просмотр заказа №'.$model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $payment = \app\models\Order::getPayment(); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'created_at',
            'updated_at',
            'qty',
            'sum',
            [
                'attribute' => 'status',
                'value' => !$model->status ? '<span class="text-danger" style="font-weight: bold">Активен</span>' : '<span class="text-success">Завершен</span>',
                'format' => 'html'
            ],
            'name',
            'email:email',
            'phone',
            'city',
            [
                'attribute' => 'payment',
                'value' => function () use ($payment, $model) {
                    if ($model->payment) {
                        return $payment[$model->payment];
                    }
                }
            ],
            'comment',
            'address',
        ],
    ]) ?>

    <?php $items = $model->orderItems; ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Количество</th>
                <th>Цена</th>
                <th>Сумма</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($items as $id => $product): ?>
                <?php if ($product): ?>
                <tr>
                    <td><a href="<?=Url::to(['product/view', 'id' => $product['product_id']])?>" target="_blank"><?=$product['name']?></a></td>
                    <td><?=$product['qty_item']?></td>
                    <td><?=$product['price']?></td>
                    <td><?=$product['sum_item']?></td>
                </tr>
                    <?php endif; ?>
            <?php endforeach; ?>

            </tbody>

        </table>
    </div>

</div>
