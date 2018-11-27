<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "offers".
 *
 * @property integer $id
 * @property string $title
 * @property string $title_ru
 * @property string $description
 * @property string $description_ru
 * @property string $link
 * @property integer $chekbox
 */
class Offers extends Img
{

    public $oStore;
    public $img;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'offers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['oStore','storlink'], 'safe'],
            [['description', 'description_ru','pre_description_ru','pre_description'], 'string'],
            [['chekbox'], 'integer'],
            [['title', 'title_ru', 'link'], 'string', 'max' => 100],
            [['img'], 'file', 'extensions' => 'png, jpg, svg, gif'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'title_ru' => 'Заголовок Ru',
            'description' => 'Описание',
            'description_ru' => 'Описание Ru',
            'link' => 'Ссылка на магазин',
            'chekbox' => 'Что делать при клике на акцию?',
            'img' => 'Картинка акции',
            'pre_description' => 'Коментарий к акции',
            'pre_description_ru' => 'Коментарий к акции Ru',
        ];
    }

    public function afterFind()
    {
        $this->images = json_decode($this->images);
        $this->oStore = ArrayHelper::map($this->store, 'name', 'name');
        if(Yii::$app->language=='ru'){
            $this->title = $this->title_ru;
            $this->description = $this->description_ru;
            $this->pre_description = $this->pre_description_ru;
        }
        parent::afterFind();
    }
    public function beforeSave($insert)
    {
        $this->img = UploadedFile::getInstance( $this, 'img');
        if($this->images==null){
            $this->images = [
                "img"=>"",

            ];
            $this->images = json_encode($this->images);
            $this->images = json_decode($this->images);
        }

        if($this->img){
            $name =  $this->generateName() . '.' . $this->img->extension;
            $this->img->saveAs(Yii::getAlias("@frontend").'/web/images/' .$name);
            $this->images->img = $name;
        }


        $this->images = json_encode($this->images);


        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if (is_array($this->oStore)) {
            $old_store = ArrayHelper::map($this->store, 'name', 'id');
            foreach ($this->oStore as $one_stor) {
                if (isset($old_store[$one_stor])) {
                    unset($old_store[$one_stor]);
                } else {
                    $this->createNewStor($one_stor);
                }
            }
            OffersStore::deleteAll(['and', ['id_offers' => $this->id], ['id_store' => $old_store]]);
        } else {
            OffersStore::deleteAll(['id_offers' => $this->id]);
        }
    }

    private function createNewStor($one_stor)
    {
        $store = Store::find()->andWhere(['name' => $one_stor])->one();
        if (isset($store)) {
            $offersStore = new OffersStore();
            $offersStore->id_offers = $this->id;
            $offersStore->id_store = $store->id;
            if ($offersStore->save()) {
                return $offersStore->id;
            }
        }
    }


    public function getOffersStore()
    {
        return $this->hasMany(OffersStore::className(), ['id_offers' => 'id']);
    }

    public function getStore()
    {
        return $this->hasMany(Store::className(), ['id' => 'id_store'])->via('offersStore');
    }
}