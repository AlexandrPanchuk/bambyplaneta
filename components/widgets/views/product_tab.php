<?php
use app\components\helper\PriceHelper;
use yii\helpers\Html;
?>


<div class="category-tab shop-details-tab">
    <div class="col-sm-12">
        <ul class="nav nav-tabs">
            <li><a href="#details" data-toggle="tab">Информация о товаре</a></li>
            <li class="active"><a href="#companyprofile" data-toggle="tab">Похожие товары с категории</a></li>

            
            <li><a href="#delivery" data-toggle="tab">Доставка </a></li>
        </ul>
    </div>
    
    <div class="tab-content">
        
        <div class="tab-pane fade" id="details" >
            
            <div class="col-sm-6">

                <table id="prod_params" class="table table-hover table-striped" style="margin: 10px auto;width:100%;line-height:16px;font-size:14px;color:#131211;">
                    <tbody><tr class="prod_arrt_row">

                        <?php  ?>

                        <td class="prod_arrt_left" oncontextmenu="return false" onselectstart="return false" valign="top">Материал</td>
                        <td class="prod_arrt_right"  oncontextmenu="return false" onselectstart="return false" valign="top"><?= $product->material?></td></tr><tr class="prod_arrt_row">
                        <td class="prod_arrt_left" oncontextmenu="return false" onselectstart="return false" valign="top">Цвет</td>
                        <td class="prod_arrt_right" oncontextmenu="return false" onselectstart="return false" valign="top"><?=$product->color?></td></tr><tr class="prod_arrt_row">
                        <td class="prod_arrt_left" oncontextmenu="return false" onselectstart="return false" valign="top">Бренд</td>
                        <td class="prod_arrt_right" oncontextmenu="return false" onselectstart="return false" valign="top"><?=$product->brand?></td></tr><tr class="prod_arrt_row">
                        <td class="prod_arrt_left" oncontextmenu="return false" onselectstart="return false" valign="top">Предназначение</td>
                        <td class="prod_arrt_right" oncontextmenu="return false" onselectstart="return false" valign="top"><?=$product->predestination?></td></tr>
                    </tbody>
                </table>

                <?php if($product->content) { echo $product->content; }?>
            </div>
        </div>

        <div class="tab-pane fade active in" id="companyprofile" >
            <?php if (!empty($otherProducts)): ?>
                <?php foreach ($otherProducts as $otherProduct): ?>
                    <?php
                    $otherProductImg = $otherProduct->getImage();
                    ?>
                    <div class="col-sm-3">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $otherProduct['id']])?>">
                                        <?=Html::img($otherProductImg->getUrl('200x150'), ['alt'=> $otherProduct->name])?>
                                    </a>
                                    <span class="price"><?=PriceHelper::from($otherProduct->price)?></span>
                                    <p><a href="<?=\yii\helpers\Url::to(['product/view', 'id' => $otherProduct['id']])?>"><?= $otherProduct['name'] ?></a></p>
                                    <button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Добавть в корзину</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h3>Извините, похожих товаров сейчас нет.</h3>
            <?php endif; ?>
        </div>

        <div class="tab-pane fade " id="resviews" >
            <div class="col-sm-12">
                <div id="fb-root"></div>
                <div id="fb-root"></div>
                    <script>(function(d, s, id) {
                      var js, fjs = d.getElementsByTagName(s)[0];
                      if (d.getElementById(id)) return;
                      js = d.createElement(s); js.id = id;
                      js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.10';
                      fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>
                    
                    <div class="fb-comments" data-href="<?=\yii\helpers\Url::to(['product/view', 'id' => $product->id])?>" data-width="600" data-numposts="5"></div>
               

            </div>
        </div>
        <div class="tab-pane fade " id="delivery" >
            <div class="col-sm-12">
                <div class="">
                    <p><b>Доставка:</b></p>
                    <ul>
                        <li> &#9679; 40 гривен в любую точку Украины</li>
                        <li> &#9679; Новая почта либо УкрПочта</li>
                        <li> &#9679; Отправка заказа не позднее чем через 10 дней</li>
                        <li> &#9679; Оплата при получении</li>
                    </ul>
                    <p><b>Возврат и обмен:</b></p>
                    <ul>
                        <li> &#9679; обмен/возврат товара в течение 14 дней</li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</div>
