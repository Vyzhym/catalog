<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $title_product
 * @property string $title_product_ru
 * @property string $price
 * @property string $images
 * @property string $description_product
 * @property string $description_product_ru
 * @property string $description_title
 * @property string $description_title_ru
 * @property string $chrkt_model
 * @property integer $chrkt_volumes
 * @property integer $chrkt_power
 * @property string $chrkt_bowl_material
 * @property string $chrkt_bowl_material_ru
 * @property string $chrkt_body_material
 * @property string $chrkt_body_material_ru
 * @property string $chrkt_display
 * @property integer $chrkt_count_inst_program
 * @property integer $chrkt_count_hand_program
 * @property integer $chrkt_cooker_press
 * @property integer $chrkt_temperat_control
 * @property integer $chrkt_time_control
 * @property integer $chrkt_select_type_produkt
 * @property integer $chrkt_count_heating_elements
 * @property integer $chrkt_count_heating_sensors
 * @property integer $func_multisheff
 * @property integer $func_maint_of_heat
 * @property integer $func_dela_start
 * @property integer $func_book_of_recipes
 * @property integer $modes_cash
 * @property integer $modes_soup
 * @property integer $modes_yogurt
 * @property integer $modes_child
 * @property integer $modes_tushk
 * @property integer $modes_varka
 * @property integer $modes_vypichka
 * @property integer $modes_pidsmazh
 */
class Product extends Img
{
    public $img;
    public $imageDetail;





    public $honors;
    public $pdish;
    public $instruction;
    public $guarantee;
    public $recipies;

    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['img'], 'file'],
            [['imageDetail'], 'file', 'maxFiles' => 30],

            [['instruction','guarantee','recipies'], 'file'],
            [['pdish','storlink','advantages'], 'safe'],
            [['new'], 'integer'],

            [['honors'], 'file', 'extensions' => 'png, jpg, svg, gif'],
            [['title_product', 'title_product_ru', 'description_product', 'description_product_ru', 'description_title', 'description_title_ru','questions_ua','questions_ru'], 'string'],
            [['chrkt_volumes', 'chrkt_power', 'chrkt_count_inst_program', 'chrkt_count_hand_program', 'chrkt_cooker_press', 'chrkt_temperat_control',  'chrkt_select_type_produkt', 'chrkt_count_heating_elements', 'chrkt_count_heating_sensors', 'func_multisheff', 'func_maint_of_heat', 'func_dela_start', 'func_book_of_recipes', 'modes_cash', 'modes_soup', 'modes_yogurt', 'modes_child', 'modes_tushk', 'modes_varka', 'modes_vypichka', 'modes_pidsmazh', 'type', 'popular','modes_tisto','chrkt_auto_par','chrkt_nitro_par','chrkt_teksture'], 'integer'],
            [['price'], 'string', 'max' => 10],
            [['chrkt_body_material', 'chrkt_body_material_ru','symbol'], 'string', 'max' => 100],
            [['chrkt_model', 'chrkt_time_control', 'chrkt_bowl_material', 'chrkt_bowl_material_ru',  'chrkt_display'], 'string', 'max' => 30],
            [['video_link'], 'string', 'max' => 255],


        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title_product' => 'Название продукта',
            'title_product_ru' => 'Название продукта [Ru]',
            'price' => 'Цена',
            'images' => 'Images',
            'description_product' => 'Описание продукта',
            'description_product_ru' => 'Описание продукта [Ru]',
            'description_title' => 'Заоголовок описания',
            'description_title_ru' => 'Заоголовок описания [Ru]',
            'chrkt_model' => 'Модель',
            'chrkt_volumes' => 'Об’єм (л.)',
            'chrkt_power' => 'Потужність (Вт.)',
            'chrkt_bowl_material' => 'Матеріал чаші',
            'chrkt_bowl_material_ru' => 'Матеріал чаші [Ru]',
            'chrkt_body_material' => 'Матеріал корпусу',
            'chrkt_body_material_ru' => 'Матеріал корпусу [Ru]',
            'chrkt_display' => 'Дисплей',
            'chrkt_count_inst_program' => 'Кількість встановлених програм',
            'chrkt_count_hand_program' => 'Кількість програм ручної настройки',
            'chrkt_cooker_press' => 'Готування під тиском',
            'chrkt_temperat_control' => 'Регулювання температури',
            'chrkt_time_control' => 'Регулювання часу',
            'chrkt_select_type_produkt' => 'Вибір типу продукту',
            'chrkt_count_heating_elements' => 'Кількість нагрівальних елементів (шт.)',
            'chrkt_count_heating_sensors' => 'Кількість температурних датчиків (шт.)',
            'func_multisheff' => 'Мультишеф',
            'func_maint_of_heat' => 'Підтримання тепла (год.)',
            'func_dela_start' => 'Відкладений старт (год.)',
            'func_book_of_recipes' => 'Книга рецептів',
            'modes_cash' => 'Приготування каш',
            'modes_soup' => 'Приготування супів',
            'modes_yogurt' => 'Приготування йогурту',
            'modes_child' => 'Дитяче меню',
            'modes_tushk' => 'Тушкування',
            'modes_varka' => 'Варка на пару',
            'modes_vypichka' => 'Випічка',
            'modes_pidsmazh' => 'Підсмажування',
            'img' => 'Глвная картинка',
            'imageDetail' => 'Детальные картинки',
            'honors' => 'Награды',
            'popular' => 'Выводить в секции популярные',
            'type' => 'Тип прибора',
            'pdish' => 'Блюда',
            'recipies' => 'Книга рецептов',
            'instruction' => 'Инструкция',
            'guarantee' => 'Гарантия',
            'modes_tisto' => 'Вистоювання тіста',
            'chrkt_auto_par' => 'Автоматичний випуск пари',
            'chrkt_nitro_par' => 'Прискорений випуск пари',
            'chrkt_teksture' => 'Регулювання текстури продукту',
            'symbol' => 'Ссылка на товар (Поле можно оставить пустым, оно заполниться автоматически)',
            'new' => 'Новинка',
            'video_link' => 'Ссылка на видео',
            'advantages' => 'Преимущества',

        ];
    }

    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            ProductDish::deleteAll(['id_product' => $this->id]);
            return true;
        } else {
            return false;
        }
    }


    public function beforeSave($insert)
    {
        $this->imageDetail = UploadedFile::getInstances($this, 'imageDetail');


        if ($this->images == null) {
            $this->images = [
                "img" => "",
                "imageDetail"=>[],
                "honors" => "",
                'recipies' => "",
                'instruction' => "",
                'guarantee' => "",

            ];
            $this->images = json_encode($this->images);
            $this->images = json_decode($this->images);
        }
        if ($this->guarantee) {
            $name = $this->guarantee->name . '.' . $this->guarantee->extension;
            $this->guarantee->saveAs(Yii::getAlias("@frontend") . '/web/documents/' . $name);
            $this->images->guarantee = $name;
        }
        if ($this->instruction) {
            $name = $this->instruction->name . '.' . $this->instruction->extension;
            $this->instruction->saveAs(Yii::getAlias("@frontend") . '/web/documents/' . $name);
            $this->images->instruction = $name;
        }
        if ($this->recipies) {
            $name = $this->recipies->name . '.' . $this->recipies->extension;
            $this->recipies->saveAs(Yii::getAlias("@frontend") . '/web/documents/' . $name);
            $this->images->recipies = $name;
        }
        if ($this->img) {
            $name = $this->generateName() . '.' . $this->img->extension;
            $this->img->saveAs(Yii::getAlias("@frontend") . '/web/images/' . $name);
            $this->images->img = $name;
        }

        if($this->imageDetail){
            foreach ($this->imageDetail as $file) {
                $name =  $this->generateName() . '.' . $file->extension;
                $file->saveAs(Yii::getAlias("@frontend").'/web/images/' .$name);
                $this->images->imageDetail[] = $name;
            }
        }



        if ($this->honors) {
            $name = $this->generateName() . '.' . $this->honors->extension;
            $this->honors->saveAs(Yii::getAlias("@frontend") . '/web/images/' . $name);
            $this->images->honors = $name;
        }


        $this->images = json_encode($this->images);

        if($this->symbol == ''){
            $this->symbol = $this->str2url($this->title_product);
        }else {
            $this->symbol =  trim($this->symbol);
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function afterFind()
    {
        $this->images = json_decode($this->images);

        $this->pdish = ArrayHelper::map($this->dish, 'title_ua', 'title_ua');
        parent::afterFind();
    }


    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if (is_array($this->pdish)) {
            $old_dish = ArrayHelper::map($this->dish, 'title_ua', 'id');
            foreach ($this->pdish as $one_dish) {
                if (isset($old_dish[$one_dish])) {
                    unset($old_dish[$one_dish]);
                } else {
                    $this->createNewDish($one_dish);
                }
            }
            ProductDish::deleteAll(['and', ['id_product' => $this->id], ['id_dish' => $old_dish]]);
        } else {
            ProductDish::deleteAll(['id_product' => $this->id]);
        }
    }

    private function createNewDish($one_dish)
    {
        $dish = Dish::find()->andWhere(['title_ua' => $one_dish])->one();
        if (isset($dish)) {
            $productDish = new ProductDish();
            $productDish->id_product = $this->id;
            $productDish->id_dish = $dish->id;
            if ($productDish->save()) {
                return $productDish->id;
            }
        }
    }


    public function getProductDish()
    {
        return $this->hasMany(ProductDish::className(), ['id_product' => 'id']);
    }

    public function getDish()
    {
        return $this->hasMany(Dish::className(), ['id' => 'id_dish'])->via('productDish');
    }


    private function rus2translit($string) {
        $converter = array(
            'а' => 'a',   'б' => 'b',   'в' => 'v',
            'г' => 'g',   'д' => 'd',   'е' => 'e',
            'ё' => 'e',   'ж' => 'zh',  'з' => 'z',
            'и' => 'i',   'й' => 'y',   'к' => 'k',
            'л' => 'l',   'м' => 'm',   'н' => 'n',
            'о' => 'o',   'п' => 'p',   'р' => 'r',
            'с' => 's',   'т' => 't',   'у' => 'u',
            'ф' => 'f',   'х' => 'h',   'ц' => 'c',
            'ч' => 'ch',  'ш' => 'sh',  'щ' => 'sch',
            'ь' => '\'',  'ы' => 'y',   'ъ' => '\'',
            'э' => 'e',   'ю' => 'yu',  'я' => 'ya',

            'ґ' => 'g',   'є' => 'ie',  'ї' => 'yi',
            'і' => 'i',

            'А' => 'A',   'Б' => 'B',   'В' => 'V',
            'Г' => 'G',   'Д' => 'D',   'Е' => 'E',
            'Ё' => 'E',   'Ж' => 'Zh',  'З' => 'Z',
            'И' => 'I',   'Й' => 'Y',   'К' => 'K',
            'Л' => 'L',   'М' => 'M',   'Н' => 'N',
            'О' => 'O',   'П' => 'P',   'Р' => 'R',
            'С' => 'S',   'Т' => 'T',   'У' => 'U',
            'Ф' => 'F',   'Х' => 'H',   'Ц' => 'C',
            'Ч' => 'Ch',  'Ш' => 'Sh',  'Щ' => 'Sch',
            'Ь' => '\'',  'Ы' => 'Y',   'Ъ' => '\'',
            'Э' => 'E',   'Ю' => 'Yu',  'Я' => 'Ya',

            'Ґ' => 'G',   'Є'=> 'Ye',   'Ї'=> 'Yi',
            'І' => 'I',

        );
        return strtr($string, $converter);
    }

    protected function str2url($str) {
        // переводим в транслит
        $str = $this->rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");

        return $str;
    }

}
