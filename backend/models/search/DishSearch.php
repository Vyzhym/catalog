<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Dish;

/**
 * DishSearch represents the model behind the search form about `backend\models\Dish`.
 */
class DishSearch extends Dish
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'preparation_time', 'cooking_time', 'count_person'], 'integer'],
            [['title_ua', 'title_ru', 'image_dish', 'type_dish_ua', 'type_dish_ru', 'ingridients_ua', 'ingridients_ru', 'instrucrions_ua', 'instrucrions_ru'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Dish::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'preparation_time' => $this->preparation_time,
            'cooking_time' => $this->cooking_time,
            'count_person' => $this->count_person,
        ]);

        $query->andFilterWhere(['like', 'title_ua', $this->title_ua])
            ->andFilterWhere(['like', 'title_ru', $this->title_ru])
            ->andFilterWhere(['like', 'image_dish', $this->image_dish])
            ->andFilterWhere(['like', 'type_dish_ua', $this->type_dish_ua])
            ->andFilterWhere(['like', 'type_dish_ru', $this->type_dish_ru])
            ->andFilterWhere(['like', 'ingridients_ua', $this->ingridients_ua])
            ->andFilterWhere(['like', 'ingridients_ru', $this->ingridients_ru])
            ->andFilterWhere(['like', 'instrucrions_ua', $this->instrucrions_ua])
            ->andFilterWhere(['like', 'instrucrions_ru', $this->instrucrions_ru]);

        return $dataProvider;
    }
}
