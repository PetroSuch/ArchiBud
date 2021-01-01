<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/bootstrap.css',
        'css/fontawesome-all.css',
        'css/magnific-popup.css',
        'css/swiper.css',
        'css/aos.css',
        'css/styles.css',
    ];
    public $js = [
        "js/jquery.min.js",
        "js/popper.min.js",
        "js/bootstrap.min.js",
        "js/jquery.easing.min.js",
        "js/swiper.min.js",
        "js/jquery.magnific-popup.js",
        "js/morphext.min.js",
        "js/isotope.pkgd.min.js",
        "js/validator.min.js",
        "js/aos.js",
        "js/scripts.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
