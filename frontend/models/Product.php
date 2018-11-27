<?php

namespace frontend\models;

use Yii;


class Product extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'product';
    }

    public function afterFind()
    {
        $this->images = json_decode($this->images);
        $this->questions_ua = json_decode($this->questions_ua);
        $this->questions_ru = json_decode($this->questions_ru);
        if (Yii::$app->language == 'ru') {
            $this->title_product = $this->title_product_ru;
            $this->description_product = $this->description_product_ru;
            $this->description_title = $this->description_title_ru;
            $this->chrkt_bowl_material = $this->chrkt_bowl_material_ru;
            $this->chrkt_body_material = $this->chrkt_body_material_ru;
        }


        parent::afterFind();
    }

    public static function createVideoLink($link)
    {
        $YoutubeCode = $link;//тут ссылка
        preg_match('#(\.be/|/embed/|/v/|/watch\?v=)([A-Za-z0-9_-]{5,11})#', $YoutubeCode, $matches);
        if(isset($matches[2]) && $matches[2] != ''){
            $YoutubeCode = $matches[2];
        }
        return $YoutubeCode;
    }


}
