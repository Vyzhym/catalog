<?php

namespace app\components;

use backend\models\Store;
use frontend\controllers\BaseController;
use frontend\controllers\BotController;
use Yii;
use frontend\models\Menu;
use yii\base\Widget;
use yii\helpers\Url;

class ShopWidget extends Widget
{
    public $lang;
    public $store;


    public function init()
    {
        $this->lang = Yii::$app->language;

        $this->store = Store::find()->all();
    }

    public function run()
    {
        $html = '
         <div class="popup_mod" data-popup="popup-shop">
    <div class="popup-inner">
            <div class="popup__shop-block">
            <ul>';


        foreach ($this->store as $item) {
            $html .= '<li ><a  rel=nofollow target = "_blank" href = "' . $item->shop_link . '" ><img src = "/images/' . $item->images->logo_store . '" alt = "shop" ></a ></li >';
        }

        $html .= '
            </ul>
        </div>
        <a class="popup-close" data-popup-close="popup-shop" href=""></a>
        <a class="popup-close popup-close-mobyl" data-popup-close="popup-shop" href="">повернутися</a>
    </div>
</div>
                ';
        return $html;
    }
}