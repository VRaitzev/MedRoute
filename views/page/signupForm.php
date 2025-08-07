<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
?>

<h1><?= Html::encode($this->title) ?></h1>



<?php $form = ActiveForm::begin(['action' => ['page/sign-up']]); ?>

<?= $form->field($model, 'login')->label('Логин') ?>
<?= $form->field($model, 'password', [
    'template' => '{label}<div class="input-group">{input}<span class="input-group-text toggle-password" data-target="signupform-password" style="cursor:pointer">👁️</span></div>{error}{hint}',
])->passwordInput(['id' => 'signupform-password']) ?>

<?= $form->field($model, 'password_confirm', [
    'template' => '{label}<div class="input-group">{input}<span class="input-group-text toggle-password" data-target="signupform-password_confirm" style="cursor:pointer">👁️</span></div>{error}{hint}',
])->passwordInput(['id' => 'signupform-password_confirm']) ?>

<div>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
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