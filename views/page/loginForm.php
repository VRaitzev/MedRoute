<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вход';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'login')->label('Логин') ?>
<?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
<?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>

<div>
    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>