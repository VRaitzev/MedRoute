<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class ServiceSearch extends Service
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name', 'cost'], 'safe'], 
        ];
    }

    public function search($params)
    {
        $query = Service::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        $query->andFilterWhere(['like', 'cost', $this->cost]);

        return $dataProvider;
    }
}
