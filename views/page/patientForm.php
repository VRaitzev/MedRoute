<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
$path = 'page/' . $action;
$this->title = 'Редактировать данные о пациенте';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin([
    'action' => [$path, 'type' => 'patient', 'id' => $model->id]
]); ?>

<?= $form->field($model, 'fio')->label('ФИО') ?>
<?= $form->field($model, 'gender')->dropDownList(['мужской' => 'Мужской', 'женский' => 'Женский'],
    ['prompt' => 'Выберите пол'])->label('Пол') ?>
<?= $form->field($model, 'date_of_birth')->input('date')->label('Дата рождения') ?>
<?= $form->field($model, 'address')->label('Адрес') ?>
<?= $form->field($model, 'phone_number')->label('Номер телефона') ?>
<?= $form->field($model, 'email')->label('Электронная почта') ?>

<div>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>