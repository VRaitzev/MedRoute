<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вход';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'login')->label('Логин') ?>
<?= $form->field($model, 'password', [
    'template' => '{label}<div class="input-group">{input}<span class="input-group-text toggle-password" data-target="loginform-password" style="cursor:pointer">👁️</span></div>{error}{hint}',
])->passwordInput(['id' => 'loginform-password']) ?>

<?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>

<div>
    <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

<?php
$js = <<<JS
document.querySelectorAll('.toggle-password').forEach(el => {
    el.addEventListener('click', () => {
        const input = document.getElementById(el.dataset.target);
        if (input) {
            input.type = input.type === 'password' ? 'text' : 'password';
        }
    });
});
JS;
$this->registerJs($js);
?>
