<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BuscarPaginas */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Paginas');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paginas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Paginas'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pag',
            'titulo',
            'contenido',
            'meta_id',
            'imagen_id',
            // 'estado',
            // 'autor_id',
            // 'slug',
            // 'meta_keywords',
            // 'meta_description',
            // 'meta_code_css:ntext',
            // 'meta_code_js:ntext',
            // 'creado',
            // 'actualizado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
