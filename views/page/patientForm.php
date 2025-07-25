<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактировать данные о пациенте';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin([
    'action' => ['page/update', 'type' => 'patient', 'id' => $model->id]
]); ?>

<?= $form->field($model, 'fio') ?>
<?= $form->field($model, 'gender') ?>
<?= $form->field($model, 'date_of_birth') ?>
<?= $form->field($model, 'address') ?>
<?= $form->field($model, 'phone_number') ?>
<?= $form->field($model, 'email') ?>

<div>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>