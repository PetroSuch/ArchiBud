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
        'css/slick.css',
        'css/slick-theme.css',
        'css/basic.min.css',
        'css/dropzone.min.css',
        'css/styles.css',
         "css/sweetalert2.min.css",

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
        "js/parallax.min.js",
        "js/aos.js",
        "js/slick.min.js",
        "js/jquery.validate.min.js",
        "js/dropzone.min.js",
        "js/localization/messages_uk.min.js",
        "js/sweetalert2.min.js",
        "js/scripts.js"
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
