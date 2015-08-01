<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Paginas */

$this->title = Yii::t('app', 'Create Paginas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paginas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paginas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
