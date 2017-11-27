<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = '404 – страница не найдена';
?>

    <style type="text/css">
        html, body {width:100%;height:100%;overflow:hidden;margin:0px;padding:0px;font-family:'Open Sans',sans-serif;font-size:16px}
        body {background:url('/web/images/404/404.png') center no-repeat #fff}
        .content {width:100%;text-align:center;position:absolute;bottom:10%;left:0px;}
        .content a {display:inline-block;text-decoration:none}
        .content a:hover {opacity:0.7}
        .content a, .content a:hover {color:#000;}
        @media only screen and (max-width: 460px), screen and (max-height: 700px) {
            .content {position:static;}
            .content a {display:block;width:100%;height:100%;position:absolute;top:0px;left:0px;font-size:0px;opacity:0;}
            body {background-size:cover}
        }
    </style>
<div class="site-error">

    <div class="contenterror" style="height: 200px"></div>
    <a href="/" style="
            text-align: center;
            width: 100%;
            display: block;
            font-size: 21px;
            font-weight: bold;
            color: #0f0f0f;">
        Перейти к главной странице
    </a>

</div>
