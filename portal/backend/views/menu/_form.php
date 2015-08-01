<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\Menu */
/* @var $form yii\widgets\ActiveForm */

$paginas = $modPaginas->find()->All();
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php echo Html::hiddenInput('Menu[url]', null, array('id' => 'menu_url')); ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo_enlace')->dropDownList([ 'interno' => 'Interno', 'externo' => 'Externo', '_top' => ' top', ], ['prompt' => 'Elija tipo de enlace']) ?>
    
    <?= $form->field($model, 'enlace')->textInput(['maxlength' => true]) ?>
    
    <?php
    if(!empty($paginas)){
        echo $form->field($modPaginas, 'titulo')->dropDownList(
            ArrayHelper::map($paginas, 'slug','titulo'), 
            ['prompt' => 'Seleccionar pagina']
            );
    
    }
    ?>
    
    <?= $form->field($model, 'target')->dropDownList([ '_self' => ' self', '_blank' => ' blank', '_top' => ' top', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'clase')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'padre')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
