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
        '/css/style.css',
	    '/css/owl.carousel.min.css',
	    '/css/owl.theme.default.min.css',
        '/css/lightbox.css',
    ];
    public $js = [
	    '/js/jquery.spincrement.js',
	    '/js/custom.js',
	    '/js/main.js',
	    '/js/owl.carousel.js',
        '/js/lightbox.js',
	    '/js/ajax.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
