<?php

namespace app\models;

use yii\db\ActiveRecord;

class Doctor extends ActiveRecord
{
    public static function tableName()
    {
        return 'users';
    }
     public function rules()
    {
        return [
            [['username', 'email'], 'required'], // обязательно
            ['email', 'email'],                  // проверка email
            [['username', 'email'], 'string', 'max' => 255], // строки
        ];
    }
}