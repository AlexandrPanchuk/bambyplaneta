<?php use app\components\helper\PriceHelper;
use yii\helpers\Html;
?>
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
        <tr style="background: #f9f9f9">
            <th style="padding: 8px; border: 1px solid #ddd;">Название</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Количество</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Цена</th>
            <th style="padding: 8px; border: 1px solid #ddd;">Сумма</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($session['cart'] as $id => $product): ?>
            <tr>
                <td style="padding: 8px; border: 1px solid #ddd;"><?=$product['name']?></td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?=$product['qty']?></td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?=$product['price']?></td>
                <td style="padding: 8px; border: 1px solid #ddd;"><?=$product['price'] * $product['qty']?></td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">Итого: </td>
            <td style="padding: 8px; border: 1px solid #ddd;"><?=$session['cart.qty']?></td>
        </tr>
        <tr>
            <td colspan="3" style="padding: 8px; border: 1px solid #ddd;">На сумму: </td>
            <td style="padding: 8px; border: 1px solid #ddd;" ><?= PriceHelper::from($session['cart.sum'])?></td>
        </tr>
        </tbody>

        <h3>Спасибо за ваш заказ. В ближайшее время с вами свяжется администратор.</h3>
    </table>
</div>
