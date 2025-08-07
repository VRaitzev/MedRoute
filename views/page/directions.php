<?php

use app\models\Direction;
use app\models\DirectionSearch;
use yii\helpers\Html;
use yii\grid\GridView;

use yii\data\ActiveDataProvider;
?>
<h1>Направления</h1>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'layout' => "{summary}\n{items}\n{pager}",
    'summary' => 'Показано {begin}–{end} из {totalCount}',
    'columns' => [
        [
            'attribute' => 'patientFio',
            'value' => function ($model) {
                return $model->patient->fio ?? '(не указано)';
            },
            'label' => 'Пациент',
        ],
        [
            'attribute' => 'serviceName',
            'value' => function ($model) {
                $services = $model->services;
                if (empty($services)) {
                    return '(не указано)';
                }
                $names = array_map(fn($service) => $service->name, $services);
                return implode(', ', $names);
},
            'label' => 'Услуга',
        ],
        [
            'attribute' => 'doctorFio',
            'value' => function ($model) {
                return $model->doctor->fio ?? '(не указано)';
            },
            'label' => 'Врач',
        ],
        [
            'attribute' => 'date',
            'label' => 'Дата',
            'format' => ['date', 'php:d.m.Y'],
        ],
        [
            'attribute' => 'totalCost',
            'label' => 'Общая цена',
            'value' => function ($model) {
                return number_format((int) $model->totalCost, 0, ',', ' ') . ' руб';
            },
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}',
            'urlCreator' => function ($action, $model, $key, $index) {
                return \yii\helpers\Url::to([
                    "page/$action",
                    'type' => 'direction',
                    'id' => $model->id
                ]);
            },
        ],
    ],
]) ?>
<?= Html::a('Добавить направление', ['page/create', 'type' => 'direction'], [
    'class' => 'btn btn-success'
]);?>