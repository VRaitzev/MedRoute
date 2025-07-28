<?php
use yii\grid\GridView;
use yii\helpers\Html;
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\ServiceSearch $searchModel */
?>

<h1>Услуги</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'name',
        'cost',
    [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{update} {delete}',
    'urlCreator' => function ($action, $model, $key, $index) {
        return \yii\helpers\Url::to([
            "page/$action",      
            'type' => 'service',
            'id' => $model->id
        ]);
    },
    ],
    ],
]) ?>

<?= Html::a('Добавить услугу', ['page/create', 'type' => 'service'], [
    'class' => 'btn btn-success'
]);?>

