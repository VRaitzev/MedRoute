<?php

namespace app\controllers;

use app\models\Direction;
use app\models\Doctor;
use Yii;
use yii\web\Controller;
use app\models\Service;
use app\models\Patient;
use yii\data\ActiveDataProvider;
use app\models\ServiceSearch;
use app\models\PatientSearch;
use app\models\DoctorSearch;
use app\models\DirectionSearch;
use app\models\SignupForm;
use app\models\MyLoginForm;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

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
        $searchModel = new DirectionSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('directions', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
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
        case 'direction':
            $model = Direction::findOne($id);
            $redirect = 'directions';
            break;
        default:
            throw new \yii\web\NotFoundHttpException('Неверный тип');
    }

    $model->delete_status = true;
    $model->save(false, ['delete_status']);
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
        case 'direction':
            $model = Direction::findOne($id);
            $redirect = 'directionForm';
            $redirect_end = 'directions';
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
        case 'direction':
            $model = new Direction();
            $redirect = 'directionForm';
            $redirect_end = 'directions';
            break;
        default:
            throw new \yii\web\NotFoundHttpException('Неверный тип');
    }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(["page/" . $redirect_end]); 
        }

        return $this->render($redirect, ['model' => $model, 'action' => 'create']);
    }   

    public function actionSignUp()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post()) && $admin = $model->signup()) {
            Yii::$app->user->login($admin);
            return $this->redirect(['page/services']);
    }

    return $this->render('signupForm', ['model' => $model]);
    }
    public function actionLogin()
{
        $model = new MyLoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->redirect(['page/services']);
        }

        return $this->render('loginForm', ['model' => $model]);
}
    public function actionLogout()
{
        Yii::$app->user->logout();

        // Очистить сессию
        Yii::$app->session->destroy();

        // Очистить куки сессии (название может отличаться)
        Yii::$app->response->cookies->remove(Yii::$app->session->name);

        return $this->goHome();
}
public function behaviors()
{
    $behaviors = parent::behaviors();

    $behaviors['access'] = [
        'class' => AccessControl::class,
        'rules' => [
            [
                'actions' => ['login', 'sign-up'],
                'allow' => true,
                'roles' => ['?'], // только гости
            ],
            [
                'allow' => true,
                'roles' => ['@'], // авторизованные – всё остальное
            ],
        ],
        'denyCallback' => function ($rule, $action) {
            return Yii::$app->user->loginRequired();
        },
    ];

    $behaviors['verbs'] = [
        'class' => VerbFilter::class,
        'actions' => [
            'logout' => ['get'],
        ],
    ];

    return $behaviors;
}
}