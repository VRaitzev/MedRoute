<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class DoctorSearch extends Doctor
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fio', 'position'], 'safe'], 
        ];
    }

    public function search($params)
    {
        $query = Doctor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'fio', $this->fio]);
        $query->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
