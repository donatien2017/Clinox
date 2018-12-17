<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ReductionsoinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Réduction sur soins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reductionsoin-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Enrégistrer une réduction sur soin', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idassurance0.libassurance',
            'idsoin0.libsoin',
            [
                'attribute' => 'taux',
                'value' => function ($model) {
                    return $model->taux . ' %';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
