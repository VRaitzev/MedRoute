<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
?>

<h1><?= Html::encode($this->title) ?></h1>



<?php $form = ActiveForm::begin(['action' => ['page/sign-up']]); ?>

<?= $form->field($model, 'login')->label('Логин') ?>
<?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
<?= $form->field($model, 'password_confirm')->passwordInput()->label('Повторите пароль') ?>

<div>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>