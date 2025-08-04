<?php
use yii\grid\GridView;
use yii\helpers\Html;
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\ServiceSearch $searchModel */
?>

<h1>Врачи</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['attribute' =>'fio',
    'label' => 'ФИО'],
        ['attribute' => 'position',
    'label' => 'Должность'],
        [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{update} {delete}',
    'urlCreator' => function ($action, $model, $key, $index) {
        return \yii\helpers\Url::to([
            "page/$action",      
            'type' => 'doctor',
            'id' => $model->id
        ]);
    },
    ],
    ],
]) ?>
<?= Html::a('Добавить врача', ['page/create', 'type' => 'doctor'], [
    'class' => 'btn btn-success'
]);?>