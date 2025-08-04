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
            [['fio', 'position'], 'required'],                 
            [['fio', 'position'], 'string', 'max' => 255], 
        ];
    }

    public static function find()
{
    return parent::find()->alias('doc')->andWhere(['doc.delete_status' => false]);
}
}