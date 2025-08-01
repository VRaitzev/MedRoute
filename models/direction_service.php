<?php

namespace app\models;

use yii\db\ActiveRecord;

class DirectionService extends ActiveRecord
{
    public static function tableName()
    {
        return 'direction_list_services';
    }
     public function rules()
    {
        return [
        [['direction_id', 'service_id'], 'required'],
        [['direction_id', 'service_id'], 'integer'],                
        ];
    }
    public function getService()
    {
        return $this->hasOne(Service::class, ['id' => 'service_id']);
    }

    public function getDirection()
    {
        return $this->hasOne(Direction::class, ['id' => 'direction_id']);
    }

}