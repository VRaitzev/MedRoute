<?php

namespace app\models;

use yii\db\ActiveRecord;

class Patient extends ActiveRecord
{
    public static function tableName()
    {
        return 'patients';
    }

    public function rules()
    {
        return [
            [['fio', 'gender', 'date_of_birth', 'address', 'phone_number', 'email'], 'required'],
            ['email', 'email'],
            ['gender', 'in', 'range' => ['мужской', 'женский']], 
            [['fio', 'address', 'email', 'phone_number'], 'string', 'max' => 255],
            ['date_of_birth', 'date', 'format' => 'php:Y-m-d'],
        ];
    }
}
