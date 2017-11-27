<?php

use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */


AppAsset::register($this);
?>
<?php $this->beginPage() ?>

    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <meta name="description" content="">
        <meta name="author" content="">
        <title> Админка <?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <?php
        $this->registerJsFile('/web/js/html5shiv.js', [
            'position'  => Yii\web\View::POS_HEAD,
            'condition' => 'lte IE9'
        ]);
        $this->registerJsFile('/web/js/respond.min.js', [
            'position'  => Yii\web\View::POS_HEAD,
            'condition' => 'lte IE9'
        ]);
        ?>

        <link rel="shortcut icon" href="">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/web/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/web/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/web/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/web/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

    <body>
    <?php $this->beginBody() ?>

    <header id="header">

        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="<?= Url::home()?>"><img src="/web/images/home/logo2_1.png" alt="" /></a>
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                                <?php if (!Yii::$app->user->isGuest): ?>
                                    <li>
                                        <a href="<?= Url::to(['/site/logout'])?>"><i class="fa fa-user"></i>
                                            <?=Yii::$app->user->identity['username']?> (Выход)
                                        </a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->

        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="<?= Url::to(['/admin'])?>" >Все заказы</a></li>
                                <li class="dropdown"><a href="">Управление категориями<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= Url::to(['category/index'])?>">Список категорий</a></li>
                                        <li><a href="<?= Url::to(['category/create'])?>">Добавить категорию</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Управление товарами<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= Url::to(['product/index'])?>">Список товаров</a></li>
                                        <li><a href="<?= Url::to(['product/create'])?>">Создать товар</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Атрибуты товаров<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="<?= Url::to(['attributes/index'])?>">Атрибуты</a></li>
                                        <li><a href="<?= Url::to(['product-tags/index'])?>">Связки тегов</a></li>
                                        <li><a href="<?= Url::to(['tags/index'])?>">Теги</a></li>
                                        <li><a href="<?= Url::to(['values/index'])?>">Значения</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->


    <div class="container">
        <?php if (Yii::$app->session->hasFlash('success')): ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <?php echo Yii::$app->session->getFlash('success');?>
            </div>
        <?php endif; ?>
        <?= $content; ?>
    </div>

    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>e</span>-shopper</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,sed do eiusmod tempor</p>
                        </div>
                    </div>
                    <div class="col-sm-7">

                    </div>
                    <div class="col-sm-3">
                        <div class="address">
                            <img src="/web/images/home/map.png" alt="" />
                            <p>Качественный товар из США в любой город Украины</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer-widget">
            <div class="container">

            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
<!--                    <p class="pull-left">Copyright © 2013 E-SHOPPER Inc. All rights reserved.</p>-->
<!--                    <p class="pull-right">Designed by <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>-->
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->




    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>