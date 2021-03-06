<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\BuscarPaginas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paginas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_pag') ?>

    <?= $form->field($model, 'titulo') ?>

    <?= $form->field($model, 'contenido') ?>

    <?= $form->field($model, 'meta_id') ?>

    <?= $form->field($model, 'imagen_id') ?>

    <?php // echo $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'autor_id') ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'meta_keywords') ?>

    <?php // echo $form->field($model, 'meta_description') ?>

    <?php // echo $form->field($model, 'meta_code_css') ?>

    <?php // echo $form->field($model, 'meta_code_js') ?>

    <?php // echo $form->field($model, 'creado') ?>

    <?php // echo $form->field($model, 'actualizado') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
