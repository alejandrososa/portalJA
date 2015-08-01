<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Paginas */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Paginas',
]) . ' ' . $model->id_pag;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paginas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_pag, 'url' => ['view', 'id' => $model->id_pag]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="paginas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
