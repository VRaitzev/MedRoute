<?php

// namespace app\controllers;

// use Yii;
// use app\models\MedUser;
// use yii\web\Controller;
// use yii\web\NotFoundHttpException;

// class UserController extends Controller
// {
//    public function actionIndex()
// {
//     $med_users = MedUser::find()->all();
//     return $this->render('index', ['users' => $med_users]);
// }
// public function actionUpdate($id)
// {
//     $user = MedUser::findOne($id);
//     if (!$user) {
//         throw new \yii\web\NotFoundHttpException('Пользователь не найден');
//     }

//     if ($user->load(Yii::$app->request->post()) && $user->save()) {
//         return $this->redirect(['index']); // После успешного сохранения возвращаемся к списку
//     }

//     return $this->render('update', ['user' => $user]);
// }
// public function actionDelete($id)
// {
//     $user = MedUser::findOne($id);
//     if ($user) {
//         $user->delete();
//     }
//     return $this->redirect(['index']);
// }
//     public function actionCreate()
// {
//     $user = new \app\models\MedUser();

//     if ($user->load(\Yii::$app->request->post()) && $user->save()) {
//         return $this->redirect(['page/hello']);
//     }

//     return $this->render('create', ['user' => $user]);
// }
// }