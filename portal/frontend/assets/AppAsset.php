<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

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
        //'css/site.css',        
		'css/reset.css',
		'css/font-awesome.min.css',
		'css/main-stylesheet.css',		
		'css/white-edition.css',
		'css/lightbox.css',
		'css/shortcodes.css',
		'css/custom-fonts.css',
		'css/custom-colors.css',
		'css/owl.carousel.css',
		'css/responsive.css',
		'css/animate.css',
		'css/dat-menu.css',
		
		'css/ie-ancient.css',
		
    ];
    public $js = [
        'js/jquery-latest.min.js',
        'js/elementQuery.min.js',
        'js/theme-scripts.js',
        'js/lightbox.js',
        'js/iscroll.js',
        'js/modernizr.custom.50878.js',
        'js/dat-menu.js',
        'js/SmoothScroll.min.js',
        'js/owl.carousel.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
