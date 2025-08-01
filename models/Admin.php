<?php

namespace app\models;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;

class Admin extends ActiveRecord implements IdentityInterface
{
    public static function tableName()
    {
        return 'admins';
    }
     public function rules()
    {
        return [
            [['login', 'password_hash'], 'required'],                 
            [['password_hash', 'auth_key'], 'string', 'max' => 255], 
            [['login'], 'email'], 
            [['login'], 'unique'],
            [['created_at'], 'safe'],
        ];
    }
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null; // если не используешь токены
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
}