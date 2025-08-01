<?php

namespace app\models;

use yii\db\ActiveRecord;

class Direction extends ActiveRecord
{
    public $service_ids = []; 
    public static function tableName()
    {
        return 'direction_list';
    }
     public function rules()
    {
        return [
        [['doctor_id', 'patient_id', 'date'], 'required'],
        [['doctor_id', 'patient_id'], 'integer'],   
        [['service_ids'], 'each', 'rule' => ['integer']],    
        [['date'], 'date', 'format' => 'php:Y-m-d'],         
        ];
    }
    public function getPatient()
    {
        return $this->hasOne(Patient::class, ['id' => 'patient_id']);
    }

    public function getDoctor()
    {
        return $this->hasOne(Doctor::class, ['id' => 'doctor_id']);
    }
    public function getServices()
{
        return $this->hasMany(Service::class, ['id' => 'service_id'])
                    ->viaTable('direction_list_services', ['direction_id' => 'id']);
}
    public function afterFind()
    {
        parent::afterFind();
        $this->service_ids = $this->getServices()->select('id')->column();
    }
     public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);

        \Yii::$app->db->createCommand()
            ->delete('direction_list_services', ['direction_id' => $this->id])
            ->execute();

        if (is_array($this->service_ids)) {
            $rows = [];
            foreach ($this->service_ids as $service_id) {
                $rows[] = [
                    'direction_id' => $this->id,
                    'service_id' => $service_id,
                ];
            }
            if (!empty($rows)) {
                \Yii::$app->db->createCommand()
                    ->batchInsert('direction_list_services', ['direction_id', 'service_id'], $rows)
                    ->execute();
            }
        }
    }
}