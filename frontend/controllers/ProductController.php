<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 30.05.2018
 * Time: 11:57
 */

namespace frontend\controllers;


use backend\models\Advantage;
use frontend\models\Product;

/*
 * Отвечает за рендер /catalog
 * а такеже за рендер детальной страницы продукта
 * */

class ProductController extends BaseController
{

    public function actionCatalog()
    {
        $power = Product::find()->select(['chrkt_power'])->distinct()->asArray()->all();
        $count_program = Product::find()->orderBy('chrkt_count_inst_program')->select(['chrkt_count_inst_program'])->distinct()->asArray()->all();
        $volumes = Product::find()->select(['chrkt_volumes'])->distinct()->asArray()->all();
        $recipies = Product::find()->select(['func_book_of_recipes'])->distinct()->asArray()->all();
        $product = Product::find()->orderBy(['price'=>SORT_DESC])->all();
        return $this->render('catalog', ['power' => $power, 'count_program' => $count_program, 'volumes' => $volumes, 'product' => $product, 'recipies'=>$recipies]);
    }


    public function actionDetailed($symbol)
    {

    $dish = \backend\models\Product::findOne(['symbol' => $symbol])->getProductDish()->with('dish')->with('product')->all();
    $product = Product::findOne(['symbol' => $symbol]);
        $video_id = Product::createVideoLink($product->video_link);
        $interes_prod = $_COOKIE['interes_prod'];
        $interes_prod = array_unique(explode(',', $interes_prod));
        $interes_prod = implode(',', $interes_prod);
        if(!empty($interes_prod)) {
            $query = 'SELECT * FROM `product` WHERE `id` IN ' . '(' . $interes_prod . ')';
            $interes_prod = Product::findBySql($query)->all();
        }
        if(!empty($product->advantages)) {
            $query = 'SELECT * FROM `advantage` WHERE `id` IN ' . '(' . $product->advantages . ')';
            $advantages = Product::findBySql($query)->asArray()->all();
        }

         return $this->render('detailed', ['product' => $product,'advantages'=>$advantages, 'interes_prod' => $interes_prod, 'dish'=>$dish, 'video_id' => $video_id]);
    }

    public function actionFind()//получаем аякс запрос в ответ гененрируем HTML продуктов
    {
        if (\Yii::$app->request->isAjax) {
            $product = $this->parsSQL($_POST['obj']);

            return $this->renderPartial('_product', ['product' => $product]);
        }
    }

    public function parsSQL($arr)//парсится SQL для фильтра товаров
    {
        $query = '';
        foreach ($arr as $key => $val) {
            if($key != 'sort' && $key != 'func_maint_of_heat' && $key != 'func_dela_start') {
                $query .= $key . " IN (" . $val . ") AND ";
            }
        }
        $query = substr($query, 0, -5);
        if(!empty($query)) {
            $query = 'SELECT * FROM product WHERE ' . $query;
            if($arr['func_maint_of_heat']) {
                $query .= " OR func_maint_of_heat <> 0";
            }
            if($arr['func_dela_start']) {
                $query .= " OR func_dela_start <> 0";
            }
        }else {
            $query = 'SELECT * FROM product';
            if($arr['func_maint_of_heat']) {
                $query .= " WHERE func_maint_of_heat <> 0";
            }
            if($arr['func_dela_start']) {
                $query .= " WHERE func_dela_start <> 0";
            }
        }
        if(isset($arr['sort'])){
            $query .= ' ORDER BY '.trim($arr['sort'], ',');
        }
        if(!isset($arr['sort'])){
            $query .= ' ORDER BY price DESC';
        }

        $product = Product::findBySql($query)->all();
        return $product;
    }

}