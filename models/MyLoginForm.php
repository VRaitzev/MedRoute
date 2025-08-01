<?php
namespace app\models;

use Yii;
use yii\base\Model;
use app\models\Admin;

class MyLoginForm extends Model
{
    public $login;
    public $password;
    public $rememberMe = true;


    private ?Admin $_user = null;

    public function rules()
    {
        return [
            [['login', 'password'], 'required'],
            ['login', 'email'],
            ['password', 'validatePassword'],
            ['rememberMe', 'boolean'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password_hash)) {
                $this->addError($attribute, 'Неправильный логин или пароль.');
            }
        }
    }

    public function login()
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if ($user) {
                return Yii::$app->user->login(
                    $user,
                    $this->rememberMe ? 3600 * 24 * 30 : 0
                );
            }
        }
        return false;
    }

    protected function getUser(): ?Admin
    {
        if ($this->_user === null) {
            $this->_user = Admin::findOne(['login' => mb_strtolower($this->login)]);
        }
        return $this->_user;
    }
}