<?php

namespace frontend\models;

use Yii;


class Slider extends \yii\db\ActiveRecord
{

    public static function tableName()
    {
        return 'slider';
    }

    public function afterFind()
    {
        $this->images = json_decode($this->images);

        if (Yii::$app->language == 'ru') {
            $this->title = $this->title_ru;
            $this->description = $this->description_ru;
        }


        parent::afterFind();
    }


}
