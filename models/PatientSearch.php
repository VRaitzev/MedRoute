<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class PatientSearch extends Patient
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['fio', 'gender', 'date_of_birth', 'address', 'phone_number', 'email'], 'safe'], 
        ];
    }

    public function search($params)
    {
        $query = Patient::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'fio', $this->fio]);
        $query->andFilterWhere(['gender' => $this->gender]);
        $query->andFilterWhere(['like', 'date_of_birth', $this->date_of_birth]);
        $query->andFilterWhere(['like', 'address', $this->address]);
        $query->andFilterWhere(['like', 'phone_number', $this->phone_number]);
        $query->andFilterWhere(['like', 'email', $this->email]);

        return $dataProvider;
    }
}
