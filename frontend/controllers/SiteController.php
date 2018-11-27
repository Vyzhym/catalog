<?php

namespace frontend\controllers;

use backend\models\Product;
use backend\models\Store;
use backend\models\VideoIndex;
use frontend\models\Dish;
use frontend\models\Slider;
use Yii;
use yii\base\InvalidParamException;
use yii\db\Expression;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use frontend\controllers\BaseController;

class SiteController extends BaseController
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $dish_obj = Slider::find()->all();
        $popular = Product::find()->where(['popular' => 1])->orderBy([new Expression('rand()')])->all();
        $video = VideoIndex::findOne(1);
        $YoutubeCode = json_decode($video->video_link);

        $bg_video = $video->images->img;

        return $this->render('index', ['dish_obj' => $dish_obj, 'popular' => $popular, 'YoutubeCode' => $YoutubeCode, 'bg_video' => $bg_video]);
    }

    public function actionOffers()
    {
           if (Yii::$app->request->isAjax) {
            $store = \backend\models\Offers::find()->select('storlink')->where(['id'=>$_POST['id']])->asArray()->one();
            $store = json_decode($store['storlink'],true);
            $html = "";

            foreach ($store as $item) {
                $img = $item['image'];
                $link = $item['link'];
                $name = $item['title'];
                $html .= '<li><a href="' . $link . '"><img src="/images/' . $img . '" alt="' . $name . '"></a></li>';
            }
            return $html;
        }
        $offers = \backend\models\Offers::find()->with('store')->all();
        return $this->render('offers', ['offers' => $offers]);
    }


    public function actionShopsWidget()//виджет магазинов "где купить" для конкретного товара
    {
           if (Yii::$app->request->isAjax) {
            $store = \backend\models\Product::find()->select('storlink')->where(['id'=>$_POST['id']])->asArray()->one();
            $store = json_decode($store['storlink'],true);
            $html = "";

            foreach ($store as $item) {

                $store = Store::findOne(['id' => $item['id']]);
                $img = $store->images->logo_store;
                $link = $item['link'];
                $name = $item['title'];
                $html .= '<li><a target="_blank" href="' . $link . '"><img src="/images/' . $img . '" alt="' . $name . '"></a></li>';
            }
            return $html;
        }
        $offers = \backend\models\Offers::find()->with('store')->all();
        return $this->render('offers', ['offers' => $offers]);
    }

    public function actionCompare()
    {
        
        $id1 = $_COOKIE['id1'];
        $id2 = $_COOKIE['id2'];
        $id3 = $_COOKIE['id3'];
        $compare_product = Product::findAll([$id1, $id2, $id3]);

        return $this->render('compare', compact('compare_product'));
    }

    public function actionDish($symbol)
    {
        $dish_obj = Dish::findOne(['symbol' => $symbol]);
        if (isset($symbol) && $symbol != '' && isset($dish_obj)) {

            return $this->render('dish', ['dish_obj' => $dish_obj]);
        } else {
            return $this->redirect(['product/catalog']);
        }
    }

    public function actionHistory()
    {
        return $this->render('history');
    }

}
