<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace backend\assets;

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
        'css/site.css',
        'css/bootstrap.min.css',
        'css/sb-admin.css',
        'css/plugins/morris.css',
        'font-awesome/css/font-awesome.min.css',
    ];
    public $js = [
        //'js/jquery.js',
        'js/bootstrap.min.js',
        //'js/plugins/morris/raphael.min.js',
        //'js/plugins/morris/morris.min.js',
        //'js/plugins/morris/morris-data.js',
        'js/appja.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
