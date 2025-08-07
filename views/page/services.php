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
    'layout' => "{summary}\n{items}\n{pager}",
    'summary' => 'Показано {begin}–{end} из {totalCount}',
    'columns' => [
        [
        'attribute' => 'name',
        'label'=> 'Название'],
        ['attribute' => 'cost',
        'label'=> 'Цена'
    ],
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

