<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/slick.css',
        'css/slick-theme.css',
        'css/style.css',
    ];
    public $js = [
        'js/jquery-3.3.1.min.js',
        'js/slick.min.js',
        'js/jquery.navScroll.js',
        'js/main.js',
        'js/additional.js',

    ];
    public $depends = [
        /*'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',*/
    ];
}
