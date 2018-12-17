<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DonnesoinsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donnesoins-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'iddonnesoins') ?>

    <?= $form->field($model, 'idpatient') ?>

    <?= $form->field($model, 'datedonnesoins') ?>

    <?= $form->field($model, 'payer') ?>

    <?= $form->field($model, 'indigeant') ?>

    <?php // echo $form->field($model, 'autorisation') ?>

    <?php // echo $form->field($model, 'echeance') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
