<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AssuranceSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="assurance-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idassurance') ?>

    <?= $form->field($model, 'sigleassurance') ?>

    <?= $form->field($model, 'libassurance') ?>

    <?= $form->field($model, 'adrassurance') ?>

    <?= $form->field($model, 'telassurance') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
