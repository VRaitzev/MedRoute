<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$path = 'page/' . $action;
$this->title = 'Редактировать услугу';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin([
    'action' => [$path, 'type' => 'service', 'id' => $model->id]
]); ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'cost') ?>

<div>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>