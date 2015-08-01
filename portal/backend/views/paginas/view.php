<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Paginas */

$this->title = $model->id_pag;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Paginas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paginas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id_pag], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id_pag], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_pag',
            'titulo',
            'contenido',
            'meta_id',
            'imagen_id',
            'estado',
            'autor_id',
            'slug',
            'meta_keywords',
            'meta_description',
            'meta_code_css:ntext',
            'meta_code_js:ntext',
            'creado',
            'actualizado',
        ],
    ]) ?>

</div>
