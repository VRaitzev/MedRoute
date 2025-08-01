<?php

namespace app\models;

use yii\db\ActiveRecord;

class Service extends ActiveRecord
{
    public static function tableName()
    {
        return 'services';
    }
     public function rules()
    {
        return [
            [['name', 'cost'], 'required'],                 
            ['name', 'string', 'max' => 255],
            ['cost', 'number'] 
        ];
    }
}