<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Product;

/**
 * ProductSearch represents the model behind the search form about `backend\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'chrkt_volumes', 'chrkt_power', 'chrkt_count_inst_program', 'chrkt_count_hand_program', 'chrkt_cooker_press', 'chrkt_temperat_control', 'chrkt_time_control', 'chrkt_select_type_produkt', 'chrkt_count_heating_elements', 'chrkt_count_heating_sensors', 'func_multisheff', 'func_maint_of_heat', 'func_dela_start', 'func_book_of_recipes', 'modes_cash', 'modes_soup', 'modes_yogurt', 'modes_child', 'modes_tushk', 'modes_varka', 'modes_vypichka', 'modes_pidsmazh'], 'integer'],
            [['title_product', 'title_product_ru', 'price', 'images', 'description_product', 'description_product_ru', 'description_title', 'description_title_ru', 'chrkt_model', 'chrkt_bowl_material', 'chrkt_bowl_material_ru', 'chrkt_body_material', 'chrkt_body_material_ru', 'chrkt_display'], 'safe'],
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
        $query = Product::find();

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
            'chrkt_volumes' => $this->chrkt_volumes,
            'chrkt_power' => $this->chrkt_power,
            'chrkt_count_inst_program' => $this->chrkt_count_inst_program,
            'chrkt_count_hand_program' => $this->chrkt_count_hand_program,
            'chrkt_cooker_press' => $this->chrkt_cooker_press,
            'chrkt_temperat_control' => $this->chrkt_temperat_control,
            'chrkt_time_control' => $this->chrkt_time_control,
            'chrkt_select_type_produkt' => $this->chrkt_select_type_produkt,
            'chrkt_count_heating_elements' => $this->chrkt_count_heating_elements,
            'chrkt_count_heating_sensors' => $this->chrkt_count_heating_sensors,
            'func_multisheff' => $this->func_multisheff,
            'func_maint_of_heat' => $this->func_maint_of_heat,
            'func_dela_start' => $this->func_dela_start,
            'func_book_of_recipes' => $this->func_book_of_recipes,
            'modes_cash' => $this->modes_cash,
            'modes_soup' => $this->modes_soup,
            'modes_yogurt' => $this->modes_yogurt,
            'modes_child' => $this->modes_child,
            'modes_tushk' => $this->modes_tushk,
            'modes_varka' => $this->modes_varka,
            'modes_vypichka' => $this->modes_vypichka,
            'modes_pidsmazh' => $this->modes_pidsmazh,
        ]);

        $query->andFilterWhere(['like', 'title_product', $this->title_product])
            ->andFilterWhere(['like', 'title_product_ru', $this->title_product_ru])
            ->andFilterWhere(['like', 'price', $this->price])
            ->andFilterWhere(['like', 'images', $this->images])
            ->andFilterWhere(['like', 'description_product', $this->description_product])
            ->andFilterWhere(['like', 'description_product_ru', $this->description_product_ru])
            ->andFilterWhere(['like', 'description_title', $this->description_title])
            ->andFilterWhere(['like', 'description_title_ru', $this->description_title_ru])
            ->andFilterWhere(['like', 'chrkt_model', $this->chrkt_model])
            ->andFilterWhere(['like', 'chrkt_bowl_material', $this->chrkt_bowl_material])
            ->andFilterWhere(['like', 'chrkt_bowl_material_ru', $this->chrkt_bowl_material_ru])
            ->andFilterWhere(['like', 'chrkt_body_material', $this->chrkt_body_material])
            ->andFilterWhere(['like', 'chrkt_body_material_ru', $this->chrkt_body_material_ru])
            ->andFilterWhere(['like', 'chrkt_display', $this->chrkt_display]);

        return $dataProvider;
    }
}
