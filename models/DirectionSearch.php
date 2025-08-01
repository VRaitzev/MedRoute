<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use yii\db\Expression;

class DirectionSearch extends Direction
{
    public $patientFio;
    public $doctorFio;
    public $serviceName;

    public function rules()
    {
        return [
            [['patientFio', 'doctorFio', 'serviceName'], 'safe'],
            [['patient_id', 'doctor_id'], 'integer'], 
            ['date', 'date', 'format' => 'php:Y-m-d'],
        ];
    }

    public function search($params)
    {
        $query = Direction::find()->alias('d');

        $query->joinWith(['patient p', 'doctor doc', 'services s']);

        $query->groupBy('d.id');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['patientFio'] = [
            'asc' => ['p.fio' => SORT_ASC],
            'desc' => ['p.fio' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['doctorFio'] = [
            'asc' => ['doc.fio' => SORT_ASC],
            'desc' => ['doc.fio' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['serviceName'] = [
            'asc' => ['s.name' => SORT_ASC],
            'desc' => ['s.name' => SORT_DESC],
        ];
        $dataProvider->sort->attributes['date'] = [
            'asc' => ['d.date' => SORT_ASC],
            'desc' => ['d.date' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'p.fio', $this->patientFio]);
        $query->andFilterWhere(['like', 'doc.fio', $this->doctorFio]);

        if ($this->serviceName) {
            $query->andWhere(['like', 's.name', $this->serviceName]);
        }

        if ($this->date !== null && $this->date !== '') {
            $query->andFilterWhere(['d.date' => $this->date]);
        }

        return $dataProvider;
    }
}

