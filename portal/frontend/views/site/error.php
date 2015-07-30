<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<!-- BEGIN .full-block -->
<div class="full-block">

	<div class="ot-panel-block panel-light">
		<div class="error-big-message">
			
			<h1>UPS... ¿Dónde te has metido? </h1>
			<h2><?= Html::encode($this->title) ?></h2>

			<p><?= nl2br(Html::encode($message)) ?></p>
			<a href="index.html"><i class="fa fa-home"></i>back to homepage</a>

		</div>
	</div>

<!-- END .full-block -->
</div>