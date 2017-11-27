<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
            // 'css/bootstrap.min.css',
            'css/font-awesome.min.css',
            'css/prettyPhoto.css',
            'css/price-range.css',
            'css/animate.css',
            'css/main.css',
            'css/responsive.css',
            'css/lightview.css',
            'css/menu.css',
            'css/new_menu.css',
             'css/global.css',

    ];
    public $js = [
            // 'js/jquery.js',
            // 'js/bootstrap.min.js',
            'js/jquery.scrollUp.min.js',
            'js/price-range.js',
            'js/jquery.prettyPhoto.js',
            'js/jquery.cookie.js',
            'js/jquery.accordion.js',
            'js/main.js',
            'js/lightview.js',
             'js/slides.min.jquery.js',
            'js/productslider.js',
            'js/jquery.loupe.js',
//            'js/spinners.min.js',
//            'js/excanvas.js'
    ];

    // зависимости данных (подключаем бутстрап) 
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapPluginAsset',
    ];
}
