<?php

namespace app\models;

use yii\db\ActiveRecord;

class Doctor extends ActiveRecord
{
    public static function tableName()
    {
        return 'doctors';
    }
     public function rules()
    {
        return [
            [['fio', 'position'], 'required'],                 // проверка email
            [['fio', 'position'], 'string', 'max' => 255], // строки
        ];
    }
}