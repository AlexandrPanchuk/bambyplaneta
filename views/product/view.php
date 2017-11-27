<?php
/* @var $this yii\web\View */
use app\components\helper\PriceHelper;
use app\components\widgets\HitsItemWidget;
use app\components\widgets\ProductTabWidget;
use yii\helpers\Html;
?>
<section>
    <div class="container">
        <div class="row">

            <?php
            $mainImg = $product->getImage();
            $gallery = $product->getImages();
            ?>

            <div class="col-sm-12 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="col-sm-6 prod_det">
                        <div id="container_product">
                            <div id="products_is">
                                <div id="products_view">
                                    <div class="slides_container ">
                                        <?php foreach ($gallery as $photo): ?>
                                            <a href="" target="_blank" class="demo prevclass">
                                                <?=Html::img($photo->getUrl('350*200'), ['alt' => '', 'class' => 'demo demoimg'])?>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                    <ul class="pagination">
                                        <?php foreach ($gallery as $photo): ?>
                                            <li>
                                                <a href="#">
                                                    <?=Html::img($photo->getUrl('32x32'), ['alt' => ''])?>
                                                </a>
                                            </li>
                                        <?php endforeach; ?>

                                    </ul>
                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="product-information"><!--/product-information-->

                            <?php if ($product->new): ?>
                                <?=Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class'=>'newarrival'])?>
                            <?php endif;?>

                            <?php if ($product->sale): ?>
                                <?=Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class'=>'newarrival'])?>
                            <?php endif;?>

                            <h2><?=$product->name?></h2>
                            <!--                            <p>Web ID: 1089772</p>-->
                            <!--                            <img src="/web/images/product-details/rating.png" alt="" />-->
                            <span>
									<span><?=PriceHelper::from($product->price)?></span>
									<div class="clearfix"></div>
                                    <label>Количество:</label>
									<input type="text" value="1" id="qty" />
									<a href="<?=\yii\helpers\Url::to(['cart/add', 'id' => $product->id])?>" class="btn btn-fefault cart add-to-cart" data-id="<?=$product->id?>">
										<i class="fa fa-shopping-cart"></i>
										Добавить в корзину
									</a>
								</span>
                            <p><b>В наличии: </b> Есть в наличии</p>

                            <?php if ($product->size): ?>
                                <p><b>Размер: </b><?=$product->size?></p>
                            <?php endif; ?>

                            <p><b>Категория: </b><a href="<?=\yii\helpers\Url::to(['category/view', 'id'=>$product->category->id])?>"><?=$product->category->name?></p></a>
                            <!--                            <a href=""><img src="/web/images/product-details/share.png" class="share img-responsive"  alt="" /></a>-->
                            
                             <div id="fb-root"></div>
                            <script>(function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (d.getElementById(id)) return;
                                    js = d.createElement(s); js.id = id;
                                    js.src = 'https://connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.10';
                                    fjs.parentNode.insertBefore(js, fjs);
                                }(document, 'script', 'facebook-jssdk'));</script>

                            <div class="fb-like" data-href="<?=\yii\helpers\Url::to(['product/view', 'id' => $product->id])?>" data-layout="standard" data-action="recommend" data-size="small" data-show-faces="true" data-share="true"></div>
                        
                            
                        </div><!--/product-information-->
                    </div>
                </div><!--/product-details-->
                
                  

                <!--category-tab-->
                <?php //if ($this->beginCache('product-tab-widget', [
                    //'duration' => 3600,
                    //'variations' => $product->category->id
                //])): ?>
                    <?= ProductTabWidget::widget([
                        'product' => $product
                    ])?>
                    <?php  //$this->endCache(); endif; ?>
                <!--/category-tab-->

                <?php //if ($this->beginCache('hits-item-widget', [
                    //'duration' => 3600,
                    //'variations' => $product->category->id
                //])): ?>
                    <!--recommended_items-->
                    <?= HitsItemWidget::widget() ?>
                    <!--/recommended_items-->
                <?php //$this->endCache(); endif; ?>


            </div>
        </div>
    </div>
</section>