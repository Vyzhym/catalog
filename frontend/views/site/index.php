<?php

/* @var $this yii\web\View */

$this->title = \frontend\controllers\BaseController::getMessage(116)
?>



<main class="contant">
    <div class="main__slider">
       <?php foreach ($dish_obj as $val): ?>
       <div class="main__slider-slide">
            <div class="main__slider-inner">
                <div class="main__slider-title"><?= $val->title ?></div>
                <div class="main__slider-text"><?= $val->description ?></div>
                <a class="main__slider-btn red_btn" href="<?=\yii\helpers\Url::toRoute(['product/catalog']);?>"><?= \frontend\controllers\BaseController::getMessage(24) ?></a>
            </div>
            <img class="main__slider-img" src="/images/<?= $val->images->sliderImage; ?>" alt="baner">
        </div>
<?php endforeach; ?>

    </div>

    <section class="populap">
        <div class="wrapper">
            <h1 class="populap__title section_title"><?= \frontend\controllers\BaseController::getMessage(117)?></h1>
            <div class="populap__tabs">
                <ul class="populap__tabs-caption">
                    <li class="active"><?= \frontend\controllers\BaseController::getMessage(15)// Мультиварки ?></li>
                    <li><?= \frontend\controllers\BaseController::getMessage(16)// Скороварки ?></li>
                    <hr/>
                </ul>
                <div class="populap__tabs-content active">
                    <ul>
                        <!--Популярные мультиварки -->
                        <?php $var=0; foreach ($popular as $item):?>
                        <?php if ($item->type === 0 && $var<=3):?>
                            <li class="populap__tabs-tovar">    
                            <a data-id="<?= $item->id ?>" class="product-select" href="<?= \yii\helpers\Url::to(['product/detailed', 'symbol' => $item->symbol]); ?>">
                                <div class="img">
                                <img src="/images/<?= $item->images->img ?>" alt="<?= $item->description_title ?>" title="<?= $item->description_title ?>">
                                </div>
                                <div class="name">        
                                    <?= $item->title_product ?>
                                </div>
                                <div class="price"><span><?= ($item->price != '')?$item->price:'&nbsp;' ?></span><?= ($item->price != '')?" грн":'&nbsp;' ?></div>
                                <div class="hide-options">
                                    <ul>
                                        <li><span class="name-option"><?= \frontend\controllers\BaseController::getMessage(27)// Модель ?></span><span class="name-value"><?= $item->chrkt_model ?></span>
                                        </li>
                                        <li><span class="name-option"><?= \frontend\controllers\BaseController::getMessage(28)// Потужність ?></span><span class="name-value"><?= $item->chrkt_power ?></span>
                                        </li>
                                        <li><span class="name-option"><?= \frontend\controllers\BaseController::getMessage(29)// Кількість програм ?></span><span
                                                class="name-value"><?= $item->chrkt_count_inst_program ?></span></li>
                                        <li><span class="name-option"><?= \frontend\controllers\BaseController::getMessage(30)// Обєм ?></span><span class="name-value"><?= $item->chrkt_volumes ?>л</span></li>
                                    </ul>
                                    <a data-id="<?= $item->id ?>" class="whare_buy red_btn popap_shops_btn"><?= \frontend\controllers\BaseController::getMessage(5)//Де придбати ?></a>
                                    <?php if ($item->id != $_COOKIE['id1'] && $item->id != $_COOKIE['id2'] && $item->id != $_COOKIE['id3']) {
                                        $class = "add_compare";
                                        $message = \frontend\controllers\BaseController::getMessage(25);
                                    } else {
                                        $class = "dell_block";
                                        $message = \frontend\controllers\BaseController::getMessage(26);
                                    }
                                    ?>
                                    <a class="compare red_btn <?= $class ?>" data-id="<?= $item->id ?>"><?= $message  ?></a>    
                                </div>                            </a>
                                <?php  if($item->new == 1): ?>
                                <span class="active_element">Новинка</span>
                                <?php endif; ?>
                        </li>

                        <?php $var++; endif; ?>
                        <?php endforeach; ?>
                        <!--END Популярные мультиварки -->
                        <a class="watch-all-models" href="<?= \yii\helpers\Url::to(['product/catalog']); ?>"><?= \frontend\controllers\BaseController::getMessage(22) ?></a>
                    </ul>
                </div>

                <div class="populap__tabs-content">
                    <ul>
                        <!--Популярные скороварки -->
                        <?php $var=0; foreach ($popular as $item):?>
                            <?php  if ($item->type === 1  && $var<=3):?>
                                <li class="populap__tabs-tovar">
                                 <a data-id="<?= $item->id ?>" class="product-select" href="<?= \yii\helpers\Url::to(['product/detailed', 'symbol' => $item->symbol]); ?>">
                                    <div class="img">
                                       <img src="/images/<?= $item->images->img ?>" alt="<?= $item->description_title ?>" title="<?= $item->description_title ?>">
                                    </div>
                                    <div class="name">
                                        <?= $item->title_product ?>
                                    </div>
                                    <div class="price"><span><?= ($item->price != '')?$item->price:'&nbsp;' ?></span><?= ($item->price != '')?" грн" :'&nbsp;' ?></div>
                                    <div class="hide-options">
                                        <ul>
                                            <li><span class="name-option"><?= \frontend\controllers\BaseController::getMessage(27)// Модель ?></span><span class="name-value"><?= $item->chrkt_model ?></span>
                                            </li>
                                            <li><span class="name-option"><?= \frontend\controllers\BaseController::getMessage(28)// Потужність ?></span><span class="name-value"><?= $item->chrkt_power ?></span>
                                            </li>
                                            <li><span class="name-option"><?= \frontend\controllers\BaseController::getMessage(29)// Кількість програм ?></span><span
                                                        class="name-value"><?= $item->chrkt_count_inst_program ?></span></li>
                                            <li><span class="name-option"><?= \frontend\controllers\BaseController::getMessage(30)// Обєм ?></span><span class="name-value"><?= $item->chrkt_volumes ?>л</span></li>
                                        </ul>
                                        <a data-id="<?= $item->id ?>" class="whare_buy red_btn popap_shops_btn"><?= \frontend\controllers\BaseController::getMessage(5)//Де придбати ?></a>
                                        <?php if ($item->id != $_COOKIE['id1'] && $item->id != $_COOKIE['id2'] && $item->id != $_COOKIE['id3']) {
                                            $class = "add_compare";
                                            $message = \frontend\controllers\BaseController::getMessage(25);
                                        } else {
                                            $class = "dell_block";
                                            $message = \frontend\controllers\BaseController::getMessage(26);
                                        }
                                        ?>
                                        <a class="compare red_btn <?= $class ?>" data-id="<?= $item->id ?>"><?= $message  ?></a>
                                    </div>
                                    </a>

                                    <?php  if($item->new == 1): ?>
                                        <span class="active_element">Новинка</span>
                                    <?php endif; ?>
                                </li>

                            <?php $var++; endif; ?>
                        <?php endforeach; ?>
                        <!--END Популярные скороварки -->
                        <a class="watch-all-models" href="<?= \yii\helpers\Url::to(['product/catalog']); ?>"><?= \frontend\controllers\BaseController::getMessage(22) ?></a>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="advantages">
        <div class="min_wrapper">
            <h2 class="advantages__title section_title"><?= \frontend\controllers\BaseController::getMessage(17)// Переваги ?></h2>
            <div class="advantages__img">
                <img src="/image/advanset_img.png" alt="advantages_img">
            </div>
            <div class="advantages__info">

                <h3 class="advantages__info-title"><?= \frontend\controllers\BaseController::getMessage(31)// Мультиварки Moulinex: готувати кожен день легко! ?></h3>
                <div class="advantages__info-text">
                    <p><?= \frontend\controllers\BaseController::getMessage(32)?></p>
                </div>
            </div>
        </div>
    </section>

    <section class="tovarsinfo">
        <div class="min_wrapper">
            <h2 class="tovarsinfo__title section_title"><?= \frontend\controllers\BaseController::getMessage(18)//МУЛЬТИВАРКА АБО СКОРОВАРКА? ?></h2>
            <div class="tovarsinfo__img right">
                <img src="/image/info-img1.png" alt="tovar">
            </div>
            <div class="tovarsinfo__info">
                <h3 class="tovarsinfo__info-title"><?= \frontend\controllers\BaseController::getMessage(33)//Мультиварки Moulinex: готувати кожен день так смачно! ?></h3>
                <div class="tovarsinfo__info-text">
                    <p><?= \frontend\controllers\BaseController::getMessage(34)?></p>
                </div>
            </div>


            <div class="clearfix"></div>

            <div class="tovarsinfo__img">
                <img src="/image/info-img2.png" alt="tovar">
            </div>
            <div class="tovarsinfo__info">
                <h3 class="tovarsinfo__info-title"><?= \frontend\controllers\BaseController::getMessage(35)//Скороварки Moulinex: готувати кожен день так швидко! ?></h3>
                <div class="tovarsinfo__info-text">
                    <p><?= \frontend\controllers\BaseController::getMessage(36)?></p>
                </div>
            </div>
        </div>
    </section>

    <div class="bottom_bg" style="background-image: url(/images/<?= $bg_video ?>)">
        <div class="btn_play js-open-popup"></div>
        <div class="popup popup_video js-popup js-popup-video" data-popup="video">
            <div class="popup__in js-popup-in">
                <div class="video-slick">
                    <?php
                    foreach ($YoutubeCode as $item):
                    $id = \frontend\models\Product::createVideoLink($item);
                    ?>
                    <div style="padding:0 30px;">
                        <button class="popup__close js-close-popup" data-close="video"></button>
                        <iframe id="main_video" width="860" height="500" src="https://www.youtube.com/embed/<?= $id ?>" frameborder="0" allow="encrypted-media" allowfullscreen></iframe>
                    </div>
                  <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</main>
<div class="clearfix"></div>

</main><div class="popup_mod popup_offers" data-popup="popup-shop">    <div class="popup-inner">            <div class="popup__shop-block">             <ul class="popup_list">            </ul>        </div>        <a class="popup-close" data-popup-close="popup-shop" href=""></a>        <a class="popup-close popup-close-mobyl" data-popup-close="popup-shop" href=""><?= \frontend\controllers\BaseController::getMessage(65)// повернутися  ?></a>    </div></div>

<?= \app\components\ShopWidget::widget() ?>


