<?php
use yii\grid\GridView;
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\ServiceSearch $searchModel */
?>

<h1>Пациенты</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        'fio',
        'gender',
        'date_of_birth',
        'address',
        'phone_number',
        'email',
        [
    'class' => 'yii\grid\ActionColumn',
    'template' => '{update} {delete}',
    'urlCreator' => function ($action, $model, $key, $index) {
        return \yii\helpers\Url::to([
            "page/$action",      
            'type' => 'patient',
            'id' => $model->id
        ]);
    },
    ],
    ],
]) ?>
