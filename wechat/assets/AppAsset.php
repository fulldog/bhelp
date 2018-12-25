<?php

namespace wechat\assets;

use yii\web\AssetBundle;

/**
 * Main wechat application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@resources';

    public $baseUrl = '@resources';

    public $css = [
        'css/weui.min.css',
        'css/jquery-weui.css',
        'font/iconfont.css',
        'css/common.css',
        'css/index.css',
    ];

    public $js = [
        'font/iconfont.js',
        'js/jquery-2.1.4.js',
        'js/fastclick.js',
        'js/swiper.min.js',
        'js/common.js'
    ];

    public $depends = [
        // 'yii\web\YiiAsset',
        // 'yii\bootstrap\BootstrapAsset',
    ];

    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
