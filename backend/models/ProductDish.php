<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "product_dish".
 *
 * @property integer $id
 * @property integer $id_product
 * @property integer $id_dish
 *
 * @property Dish $idDish
 * @property Product $idProduct
 */
class ProductDish extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_dish';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_product', 'id_dish'], 'integer'],
            [['id_dish'], 'exist', 'skipOnError' => true, 'targetClass' => Dish::className(), 'targetAttribute' => ['id_dish' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['id_product' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_product' => 'Id Product',
            'id_dish' => 'Id Dish',
        ];
    }

    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'id_product']);
    }

    public function getDish()
    {
        return $this->hasOne(Dish::className(), ['id' => 'id_dish']);
    }
}
