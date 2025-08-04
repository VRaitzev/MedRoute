<?php
use yii\grid\GridView;
use yii\helpers\Html;
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var app\models\ServiceSearch $searchModel */
?>

<h1>Пациенты</h1>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['attribute' => 'fio', 'label' => 'ФИО'],
        ['attribute' => 'gender', 'label' => 'Пол'],
        ['attribute' => 'date_of_birth', 'label' => 'Дата рождения'],
        ['attribute' => 'address', 'label' => 'Адрес'],
        ['attribute' => 'phone_number', 'label' => 'Номер телефона'],
        ['attribute' => 'email', 'label' => 'Электронная почта'],
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
<?= Html::a('Добавить пациента', ['page/create', 'type' => 'patient'], [
    'class' => 'btn btn-success'
]);?>