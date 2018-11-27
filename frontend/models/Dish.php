<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "dish".
 *
 * @property integer $id
 * @property string $title_ua
 * @property string $title_ru
 * @property string $images
 * @property string $type_dish_ua
 * @property string $type_dish_ru
 * @property integer $preparation_time
 * @property integer $cooking_time
 * @property integer $count_person
 * @property string $ingridients_ua
 * @property string $ingridients_ru
 * @property string $instrucrions_ua
 * @property string $instrucrions_ru
 */
class Dish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title_ua', 'title_ru', 'images', 'type_dish_ua', 'type_dish_ru'], 'required'],
            [['images', 'ingridients_ua', 'ingridients_ru', 'instrucrions_ua', 'instrucrions_ru'], 'string'],
            [['preparation_time', 'cooking_time', 'count_person'], 'integer'],
            [['title_ua', 'title_ru'], 'string', 'max' => 100],
            [['type_dish_ua', 'type_dish_ru'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_ua' => 'Title Ua',
            'title_ru' => 'Title Ru',
            'images' => 'Images',
            'type_dish_ua' => 'Type Dish Ua',
            'type_dish_ru' => 'Type Dish Ru',
            'preparation_time' => 'Preparation Time',
            'cooking_time' => 'Cooking Time',
            'count_person' => 'Count Person',
            'ingridients_ua' => 'Ingridients Ua',
            'ingridients_ru' => 'Ingridients Ru',
            'instrucrions_ua' => 'Instrucrions Ua',
            'instrucrions_ru' => 'Instrucrions Ru',
        ];
    }
    public function afterFind()
    {
        $this->images = json_decode($this->images);
        $this->ingridients_ua = json_decode($this->ingridients_ua);
        $this->ingridients_ru = json_decode($this->ingridients_ru);

        if(Yii::$app->language=='ru'){
            $this->title_ua = $this->title_ru;
            $this->type_dish_ua = $this->type_dish_ru;
            $this->instrucrions_ua = $this->instrucrions_ru;

        }


        parent::afterFind();
    }


}
