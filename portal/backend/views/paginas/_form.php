<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Paginas */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="paginas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contenido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_id')->textInput() ?>

    <?= $form->field($model, 'imagen_id')->textInput() ?>

    <?= $form->field($model, 'estado')->dropDownList([ 'publicado' => 'Publicado', 'pendiente' => 'Pendiente', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'autor_id')->textInput() ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_code_css')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'meta_code_js')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'creado')->textInput() ?>

    <?= $form->field($model, 'actualizado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
