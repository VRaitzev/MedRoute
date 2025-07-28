<?php

namespace app\controllers;

use app\models\Doctor;
use Yii;
use yii\web\Controller;
use app\models\Service;
use app\models\Patient;
use yii\data\ActiveDataProvider;
use app\models\ServiceSearch;
use app\models\PatientSearch;
use app\models\DoctorSearch;
use Symfony\Component\VarDumper\Cloner\Data;

class PageController extends Controller
{
    
    public function actionServices()
    {
    $searchModel = new ServiceSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('services', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
    }    
    public function actionPatients()
    {
    $searchModel = new PatientSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('patients', [
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]);
    }
    public function actionDoctors()
    {
        $searchModel = new DoctorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('doctors', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }    
    public function actionDirections()
    {
        return $this->render('directions');
    }    
    
    public function actionDelete($type, $id)
{
    switch ($type) {
        case 'service':
            $model = Service::findOne($id);
            $redirect = 'services';
            break;
        case 'patient':
            $model = Patient::findOne($id);
            $redirect = 'patients';
            break;
        case 'doctor':
            $model = Doctor::findOne($id);
            $redirect = 'doctors';
            break;
        default:
            throw new \yii\web\NotFoundHttpException('Неверный тип');
    }

    if ($model) {
        $model->delete();
    }
    return $this->redirect([$redirect]);
}
    public function actionUpdate($type, $id)
    {
        switch ($type) {
        case 'service':
            $model = Service::findOne($id);
            $redirect = 'serviceForm';
            $redirect_end = 'services';
            break;
        case 'patient':
            $model = Patient::findOne($id);
            $redirect = 'patientForm';
            $redirect_end = 'patients';
            break;
        case 'doctor':
            $model = Doctor::findOne($id);
            $redirect = 'doctorForm';
            $redirect_end = 'doctors';
            break;
        default:
            throw new \yii\web\NotFoundHttpException('Неверный тип');
    }
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Сущность отсутствует!');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(["page/" . $redirect_end]); 
        }

        return $this->render($redirect, ['model' => $model, 'action' => 'update']);
    }    

    public function actionCreate($type)
    {
        switch ($type) {
        case 'service':
            $model = new Service();
            $redirect = 'serviceForm';
            $redirect_end = 'services';
            break;
        case 'patient':
            $model = new Patient();
            $redirect = 'patientForm';
            $redirect_end = 'patients';
            break;
        case 'doctor':
            $model = new Doctor();
            $redirect = 'doctorForm';
            $redirect_end = 'doctors';
            break;
        default:
            throw new \yii\web\NotFoundHttpException('Неверный тип');
    }
        if (!$model) {
            throw new \yii\web\NotFoundHttpException('Сущность отсутствует!');
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(["page/" . $redirect_end]); 
        }

        return $this->render($redirect, ['model' => $model, 'action' => 'create']);
    }   
}