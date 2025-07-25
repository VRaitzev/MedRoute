<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Редактировать данные о сотруднике';
?>

<h1><?= Html::encode($this->title) ?></h1>

<?php $form = ActiveForm::begin(['action' => ['page/update', 'type' => 'doctor', 'id' => $model->id]]); ?>

<?= $form->field($model, 'fio') ?>
<?= $form->field($model, 'position') ?>

<div>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>