<?php
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

NavBar::begin([
    'brandLabel' => 'MedRoute',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar navbar-expand-lg navbar-dark bg-dark'],
]);

echo Nav::widget(
    ['options' => ['class' => 'navbar-nav ml-auto'],
    'items' => [
        ['label' => 'Услуги', 'url' => ['/page/services']],
        ['label' => 'Врачи', 'url' => ['/page/doctors']],
        ['label' => 'Пациенты', 'url' => ['/page/patients']],
        ['label' => 'Направления', 'url' => ['/page/directions']],
        ['label' => 'Вход', 'url' => ['/page/login']],
        ['label' => 'Регистрация', 'url' => ['/page/sign-up']],

    ]]
    );
    NavBar::end();
?>