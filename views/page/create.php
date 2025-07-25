<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<h1>Добавить пользователя</h1>

<?php $form = ActiveForm::begin(); ?>

    <?= $form->field($user, 'username') ?>
    <?= $form->field($user, 'email') ?>

    <div>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

<?php ActiveForm::end(); ?>