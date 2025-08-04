<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Service;
use app\models\Patient;
use app\models\Doctor;
use yii\helpers\ArrayHelper;

$this->title = 'Редактировать данные направления';
$path = 'page/' . $action;
?>

<h1><?= Html::encode($this->title) ?></h1>



<?php $form = ActiveForm::begin(['action' => [$path, 'type' => 'direction', 'id' => $model->id]]); 
$patients = ArrayHelper::map(Patient::find()->all(), 'id', 'fio');
$services = ArrayHelper::map(Service::find()->all(), 'id', 'name');
$doctors = ArrayHelper::map(Doctor::find()->all(), 'id', 'fio');
?>

<?= $form->field($model, 'patient_id')->dropDownList($patients,
    ['prompt' => 'Выберите пациента'])->label('Пациент') ?>
<?= $form->field($model, 'service_ids')->dropDownList(
    $services,
    [
        'multiple' => true,
        'size' => 5, 
    ]
)->label('Услуги') ?>
<?= $form->field($model, 'doctor_id')->dropDownList($doctors,
    ['prompt' => 'Выберите врача'])->label('Врач') ?>
<?= $form->field($model, 'date')->input('date')->label('Дата направления') ?>

<div>
    <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>