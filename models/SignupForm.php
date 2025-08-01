<?php
namespace app\models;

use yii\base\Model;
use Yii;
use app\models\Admin;

class SignupForm extends Model
{
    public $login;
    public $password;
    public $password_confirm;

    public function rules()
    {
        return [
            [['login', 'password', 'password_confirm'], 'required'],
            ['login', 'trim'],
            ['login', 'email'],
            ['login', 'filter', 'filter' => 'mb_strtolower'],
            ['login', 'string', 'max' => 255],
            ['login', 'unique',
                'targetClass' => Admin::class,
                'targetAttribute' => 'login',
                'message' => 'Такой логин уже занят.'
            ],
            ['password', 'string', 'min' => 6],
            ['password', 'trim'],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => "Пароли не совпадают."],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $admin = new Admin();
        $admin->login = $this->login;
        $admin->password_hash = Yii::$app->security->generatePasswordHash($this->password);
        $admin->auth_key = Yii::$app->security->generateRandomString();

        return $admin->save() ? $admin : null;
    }
}
