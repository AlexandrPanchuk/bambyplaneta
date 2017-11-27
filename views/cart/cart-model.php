<?php use app\components\helper\PriceHelper;
use yii\helpers\Html;

if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Количество</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($session['cart'] as $id => $product): ?>
                    <tr>
                        <td>
                            <?= Html::img($product['img']) ?>
                        </td>
                        <td><a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $id])?>"><?=$product['name']?></a></td>
                        <td><?=$product['qty']?></td>
                        <td><?=$product['price']?></td>
                        <td><span data-id="<?=$id?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                    </tr>
                <?php endforeach; ?>
                <tr>
                    <td colspan="4">Итого: </td>
                    <td><?=$session['cart.qty']?></td>
                </tr>
                <tr>
                    <td colspan="4">На сумму: </td>
                    <td><?= PriceHelper::from($session['cart.sum'])?></td>
                </tr>
            </tbody>

        </table>
    </div>

<?php else: ?>
    <h3>Корзина пуста!</h3>
<?php endif; ?>