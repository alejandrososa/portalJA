<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;


/* @var $this yii\web\View */
/* @var $model common\models\Menu */

$this->title = Yii::t('app', 'Create Menu');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Menus'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<h1 class="page-header">
    <?= Html::encode($this->title) ?>
    <small>Subheading</small>
</h1>


                        <?= Breadcrumbs::widget([
                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                        ]) ?>

   <!--  <li>
        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
    </li>
    <li class="active">
        <i class="fa fa-file"></i> Blank Page
    </li>
     -->


    <?= $this->render('_form', [
        'model' => $model,
        'modPaginas' => $modPaginas
    ]) ?>

