<?php
use \frontend\controllers\BaseController;
use \yii\helpers\Url;

$this->title = trim($dish_obj->title_ua).' '.trim(BaseController::getMessage(175));
?>
<main class="contant">
    <div class="wrapper">
        <div class="breadcrumbs">
            <ul>
                <li><a href="<?= Url::home();?>"><?= BaseController::getMessage(37) //Домашня сторінка ?></a></li>
                <li><a href=""><?= $dish_obj->title_ua; ?></a></li>
            </ul>
        </div>
    </div>

    <h2 class="dish-title" ><?= $dish_obj->title_ua; ?></h2>
    <div class="dish__background" style="background-image: url(/images/<?= $dish_obj->images->image_dish; ?>)"></div>

    <section class="dish__sequence">
        <div class="wrapper">
            <div class="dish__sequence-inner">
                <ul>
                    <li>
                        <div class="dish__sequence-icon">
                            <img src="/image/sequence1.png" alt="sequence">
                        </div>
                        <p><?= BaseController::getMessage(7)// страва ?></p>
                        <span ><?= $dish_obj->type_dish_ua ?></span>
                    </li>
                    <li>
                        <div class="dish__sequence-icon">
                            <img src="/image/sequence2.png" alt="sequence">
                        </div>
                        <p><?= BaseController::getMessage(8)// Підготовка?></p>
                        <span><?= $dish_obj->preparation_time.' '. BaseController::getMessage(10)// хв.?></span>
                    </li>
                    <li>
                        <div class="dish__sequence-icon">
                            <img src="/image/sequence3.png" alt="sequence">
                        </div>
                        <p><?= BaseController::getMessage(9)// Приготування?></p>
                        <span><?= $dish_obj->cooking_time.' '. BaseController::getMessage(10)// хв.?></span>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="dish__ingredients">
        <div class="maxmin_wrapper">
            <h2 class="dish-title"><?= BaseController::getMessage(11)// Інгрідієнти ?></h2>
            <div class="number-persons">
                <?= BaseController::getMessage(12)//Кількісь персон: ?><span> <?= $dish_obj->count_person ?></span>
            </div>
            <div class="dish__ingredients-list">
                <ul>
                    <?php if (Yii::$app->language == 'ua') {
                        foreach ($dish_obj->ingridients_ua as $ingredient): ?>
                            <li><span class="name"><?= $ingredient->ingridient_ua ?> - </span><span class="value"><?= $ingredient->count_ingr_ua?></span></li>

                        <?php endforeach;
                    } elseif (Yii::$app->language == 'ru') {
                        foreach ($dish_obj->ingridients_ru as $ingredient) : ?>
                            <li><span class="name"><?= $ingredient->ingridient_ru ?> - </span><span class="value"><?= $ingredient->count_ingr_ru?></span></li>
                        <?php endforeach;  }
                    ?>

                </ul>
            </div>
        </div>
    </section>

    <section class="dish__instruction">
        <h2 class="dish-title"><?= BaseController::getMessage(13)// Інструкції?></h2>
        <div class="maxmin_wrapper">
            <div class="dish__instruction-text">
            <?=     $dish_obj->instrucrions_ua ?>
            </div>
        </div>
    </section>



</main>


<div class="clearfix"></div>

    </main><div class="popup_mod popup_offers" data-popup="popup-shop">    <div class="popup-inner">            <div class="popup__shop-block">             <ul class="popup_list">            </ul>        </div>        <a class="popup-close" data-popup-close="popup-shop" href=""></a>        <a class="popup-close popup-close-mobyl" data-popup-close="popup-shop" href=""><?= \frontend\controllers\BaseController::getMessage(65)// повернутися  ?></a>    </div></div>

<?= \app\components\ShopWidget::widget() ?>