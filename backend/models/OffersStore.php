<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "offers_store".
 *
 * @property integer $id
 * @property integer $id_store
 * @property integer $id_offers
 *
 * @property Offers $idOffers
 * @property Store $idStore
 */
class OffersStore extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers_store';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_store', 'id_offers'], 'integer'],
            [['id_offers'], 'exist', 'skipOnError' => true, 'targetClass' => Offers::className(), 'targetAttribute' => ['id_offers' => 'id']],
            [['id_store'], 'exist', 'skipOnError' => true, 'targetClass' => Store::className(), 'targetAttribute' => ['id_store' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_store' => 'Id Store',
            'id_offers' => 'Id Offers',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffers()
    {
        return $this->hasOne(Offers::className(), ['id' => 'id_offers']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStore()
    {
        return $this->hasOne(Store::className(), ['id' => 'id_store']);
    }
}
