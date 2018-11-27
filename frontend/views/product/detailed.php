<?php
use frontend\controllers\BaseController;

$this->title = trim($product->description_title) . ' ' . trim(BaseController::getMessage(174));

?>
    <main class="contant">
        <div class="wrapper">
            <div class="breadcrumbs">
                <ul>
                    <li>
                        <a href="<?= \yii\helpers\Url::home(); ?>"><?= BaseController::getMessage(37) //Домашня сторінка      ?></a>
                    </li>
                    <li>
                        <a href="<?= \yii\helpers\Url::to(['product/catalog']); ?>"><?= \frontend\controllers\BaseController::getMessage(2)// Мультиварки       ?></a>
                    </li>
                    <li><a href=""><?= $product->title_product ?></a></li>
                </ul>
            </div>
        </div>
        <section class="prod__cart">
            <div class="wrapper">
                <div class="prod__cart-inner">
                    <div class="prod__cart-slider-nav">
                        <div class="prod__cart-slid">
                            <img src="/images/<?= $product->images->img ?>" alt="<?= $product->description_title ?>"
                                 title="<?= $product->description_title ?>">
                        </div>
                        <?php foreach ($product->images->imageDetail as $item): ?>
                            <div class="prod__cart-slid">
                                <img src="/images/<?= $item ?>" alt="<?= $product->description_title ?>"
                                     title="<?= $product->description_title ?>">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="prod__cart-slider">
                        <div class="prod__cart-slid">
                            <img src="/images/<?= $product->images->img ?>" alt="<?= $product->description_title ?>"
                                 title="<?= $product->description_title ?>">
                        </div>
                        <?php foreach ($product->images->imageDetail as $item): ?>
                            <div class="prod__cart-slid">
                                <img src="/images/<?= $item ?>" alt="<?= $product->description_title ?>"
                                     title="<?= $product->description_title ?>">
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <?php if (!empty($product->images->honors)): ?>
                        <div class="honors">
                            <img src="/images/<?= $product->images->honors ?>" alt="Honors">
                        </div>
                    <?php endif; ?>
                </div>
                <div class="prod__cartinfo">
                    <h1 class="prod__cartinfo-name">
                        <?= $product->title_product ?>
                    </h1>
                    <div class="prod__cartinfo-buy"><?= ($product->price != '') ? $product->price : '&nbsp;' ?><?= ($product->price != '') ? " грн" : '&nbsp;' ?></div>
                    <div class="prod__cartinfo-info">
                        <p><?php

                            $str = substr($product->description_product, 0, 300);
                            if (strlen($product->description_product) > 300) {
                                $str = rtrim($str, "!,.-"); // убеждаемся нет ли в конце знаков !,.-
                                $str = $str . '...';
                            }
                            //Напоследок находим последний пробел, устраняем его и ставим троеточие
                            //$str = substr($str, 0, strrpos($str, ' '));
                            echo $str;
                            ?></p>
                    </div>
                    <a href="#all-specifications"
                       class="prod__cartinfo-link"><?= BaseController::getMessage(67) //Всі характеристики    ?></a>
                    <div class="prod__cartinfo-wrap">
                        <a data-id="<?= $product->id ?>"
                           class="whare_buy red_btn popap_shops_btn"><?= BaseController::getMessage(5) //Де придбати    ?></a>
                        <?php if ($product->id != $_COOKIE['id1'] && $product->id != $_COOKIE['id2'] && $product->id != $_COOKIE['id3']) {
                            $class = "add_compare";
                            $message = \frontend\controllers\BaseController::getMessage(25);
                        } else {
                            $class = "dell_block";
                            $message = \frontend\controllers\BaseController::getMessage(26);
                        }
                        ?>
                        <a class="prod__cartinfo-comparison <?= $class ?>"
                           data-id="<?= $product->id ?>"><?= $message ?></a>

                    </div>
                </div>
            </div>
        </section>

        <div class="clearfix"></div>
<?php if (isset($advantages)): ?>
        <section class="prod__advantages">
            <div class="wrapper">
                <div class="prod__advantages-slider">
                    <?php foreach ($advantages as $item):
                        $img = json_decode($item["images"])->imageIcons;
                        if ($img != ""):?>

                            <div class="prod__advantages-slide">
                                <div class="img"><img src="/images/<?= $img ?>"
                                                      alt="advantages"></div>
                                <p><?= (\Yii::$app->language == "ua") ? $item['text'] : $item['text_ru'] ?></p>
                            </div>
                            <?php
                        endif;
                    endforeach; ?>

                </div>
            </div>
        </section>
    <?php endif; ?>

        <section class="cart__navigation">
            <div class="wrapper">
                <div class="nav__description populap__tabs">
                    <div class="nav__description-list populap__tabs-caption">
                        <li class="active"><a href="#description"><?= BaseController::getMessage(72) //Опис     ?></a>
                        </li>
                        <li><a href="#all-specifications"><?= BaseController::getMessage(73) //Характеристики     ?></a>
                        </li>
                        <li><a href="#recipes"><?= BaseController::getMessage(74) //Рецепти     ?></a></li>
                        <li><a href="#FAQ"><?= BaseController::getMessage(75) //Часті запитання     ?></a></li>
                        <li><a href="#documentation"><?= BaseController::getMessage(76) //Документація     ?></a></li>
                        <hr/>
                        </ul>
                    </div>
                </div>
        </section>

        <section class="cert__description js-nav" id="description">
            <div class="maxmin_wrapper">
                <h3 class="cert__description-title"><?= $product->description_title ?></h3>
                <div class="cert__description-text">
                    <p><?= $product->description_product ?></p>
                    <?php if($video_id): ?>
                    <iframe class="cert__youtube" src="https://www.youtube.com/embed/<?= $video_id ?>?rel=0"
                            frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                    <?php endif; ?>
                </div>
            </div>
        </section>

        <section class="cart__specifications js-nav">
            <div class="maxmin_wrapper">
                <h3 class="cart__specifications-title"
                    id="all-specifications"><?= BaseController::getMessage(39) //Технічні характеристики     ?></h3>
                <div class="cart__specifications-table">
                    <ul>
                        <li><span class="name"><?= BaseController::getMessage(27) //Модель     ?></span><span
                                    class="status"><?= $product->chrkt_model ?></span></li>
                        <li><span class="name"><?= BaseController::getMessage(30) //Об’єм     ?></span><span
                                    class="status"><?= $product->chrkt_volumes ?> л</span></li>
                        <li><span class="name"><?= BaseController::getMessage(28) //Потужність     ?></span><span
                                    class="status"><?= $product->chrkt_power ?> Вт</span></li>
                        <li><span class="name"><?= BaseController::getMessage(40) //Матеріал чаші     ?></span><span
                                    class="status"><?= $product->chrkt_bowl_material ?></span></li>
                        <li><span class="name"><?= BaseController::getMessage(41) //Матеріал корпусу     ?></span><span
                                    class="status"><?= $product->chrkt_body_material ?></span></li>
                        <li><span class="name"><?= BaseController::getMessage(42) //Дисплей     ?></span><span
                                    class="status"><?= $product->chrkt_display ?></span></li>
                        <li>
                            <span class="name"><?= BaseController::getMessage(43) //Кількість встановлених програм     ?></span><span
                                    class="status"><?= $product->chrkt_count_inst_program ?></span></li>
                        <li>
                            <span class="name"><?= BaseController::getMessage(44) //Кількість програм ручної настройки     ?></span><span
                                    class="status"><?= $product->chrkt_count_hand_program ?></span></li>
                        <li>
                            <span class="name"><?= BaseController::getMessage(45) //Готування під тиском     ?></span><span
                                    class="status"><?= $product->chrkt_cooker_press === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></span>
                        </li>
                        <li>
                            <span class="name"><?= BaseController::getMessage(46) //Регулювання температури     ?></span><span
                                    class="status"><?= $product->chrkt_temperat_control === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></span>
                        </li>
                        <li><span class="name"><?= BaseController::getMessage(47) //Регулювання часу     ?></span><span
                                    class="status"><?= $product->chrkt_time_control ?></span></li>
                        <li>
                            <span class="name"><?= BaseController::getMessage(48) //Вибір типу продукту     ?></span><span
                                    class="status"><?= $product->chrkt_select_type_produkt === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></span>
                        </li>
                        <li>
                            <span class="name"><?= BaseController::getMessage(49) //Кількість нагрівальних елементів     ?></span><span
                                    class="status"><?= $product->chrkt_count_heating_elements ?></span></li>
                        <li>
                            <span class="name"><?= BaseController::getMessage(50) //Кількість температурних датчиків     ?></span><span
                                    class="status"><?= $product->chrkt_count_heating_sensors ?></span></li>

                    </ul>
                </div>
            </div>
        </section>
        <section class="cart__recipes js-nav" id="recipes">
            <div class="wrapper">
                <h3 class="cart__recipes-title"><?= BaseController::getMessage(78) //За допомогою мультиварки Moulinex     ?> <?= $product->title_product ?> <?= BaseController::getMessage(79) //я можу приготувати     ?> </h3>
                <div class="cart__recipes-slider">
                    <?php foreach ($dish as $item): ?>
                        <div class="cart__recipes-slids">
                            <div class="cart__recipes-img">
                                <a href="<?= \yii\helpers\Url::to(['site/dish', 'symbol' => $item->dish->symbol]); ?>">
                                    <img
                                            src="/images/<?= $item->dish->images->image_dish ?>" alt="recipes"></a>
                            </div>
                            <div class="cart__recipes-name"><?= $item->dish->title_ua ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </section>
        <?php // endif; ?>
        <section class="cart__FAQ js-nav" id="FAQ">
            <div class="maxmin_wrapper">
                <h3 class="cart__FAQ-title"><?= BaseController::getMessage(75) //Часті запитання      ?></h3>
                <div class="cart__FAQ-acardion">
                    <?php if (Yii::$app->language == 'ua' && isset($product->questions_ua)) {
                        foreach ($product->questions_ua as $item): ?>
                            <div class="cart__FAQ-question"><?= $item->question_ua ?></div>
                            <div class="cart__FAQ-answer"><?= $item->answer_quest_ua ?></div>
                        <?php endforeach;
                    } elseif (Yii::$app->language == 'ru' && isset($product->questions_ru)) {
                        foreach ($product->questions_ru as $item): ?>
                            <div class="cart__FAQ-question"><?= $item->question_ru ?></div>
                            <div class="cart__FAQ-answer"><?= $item->answer_quest_ru ?></div>
                        <?php endforeach;
                    } ?>
                </div>
            </div>
        </section>
        <?php if (!empty($product->images->instruction) || !empty($product->images->guarantee) || !empty($product->images->recipies)): ?>
            <section class="cart__documentation js-nav" id="documentation">
                <div class="maxmin_wrapper">
                    <h3 class="cart__documentation-title"><?= BaseController::getMessage(76) //Документація     ?></h3>
                    <div class="cart__documentation-blocks">
                        <?php if (!empty($product->images->instruction)): ?>
                            <a href="/documents/<?= $product->images->instruction ?>" download
                               class="cart__documentation-block"
                               href=""><span><?= BaseController::getMessage(80) //Інструкція     ?></span></a>
                        <?php endif; ?>
                        <?php if (!empty($product->images->guarantee)): ?>
                            <a href="/documents/<?= $product->images->guarantee ?>" download
                               class="cart__documentation-block"
                               href=""><span><?= BaseController::getMessage(81) //Гарантія     ?></span></a>
                        <?php endif; ?>
                        <?php if (!empty($product->images->recipies)): ?>
                            <a href="/documents/<?= $product->images->recipies ?>" download
                               class="cart__documentation-block"
                               href=""><span><?= BaseController::getMessage(74) //Рецепти     ?></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
        <div class="clearfix"></div>
        <?php if (isset($interes_prod)): ?>
            <section class="interested-tovar">
                <div class="wrapper">
                    <h3 class="interested-title"><?= BaseController::getMessage(83) //Товари, які вас зацікавили раніше     ?></h3>
                    <div class="interested-tovar-slider">
                        <?php foreach ($interes_prod as $item): ?>
                            <?php if ($item->id != $_GET['id']): ?>
                                <div class="populap__tabs-tovar">
                                    <div class="populap__tabs-inner">
                                        <div class="img">
                                            <a href="<?= \yii\helpers\Url::to(['product/detailed', 'symbol' => $item->symbol]); ?>"><img
                                                        src="/images/<?= $item->images->img ?>"
                                                        alt="<?= $item->description_title ?>"
                                                        title="<?= $item->description_title ?>"></a>
                                        </div>
                                        <div class="name">
                                            <a href="<?= \yii\helpers\Url::to(['product/detailed', 'symbol' => $item->symbol]); ?>"><?= $item->title_product ?></a>
                                        </div>
                                        <div class="price">
                                            <span><?= ($item->price != '') ? $item->price : '&nbsp;' ?></span><?= ($item->price != '') ? " грн" : '&nbsp;' ?>
                                        </div>

                                        <div class="hide-options">
                                            <a data-id="<?= $item->id ?>"
                                               class="whare_buy red_btn popap_shops_btn"><?= BaseController::getMessage(5) //Де купити     ?></a>
                                            <?php if ($item->id != $_COOKIE['id1'] && $item->id != $_COOKIE['id2'] && $item->id != $_COOKIE['id3']) {
                                                $class = "add_compare";
                                                $message = \frontend\controllers\BaseController::getMessage(25);
                                            } else {
                                                $class = "dell_block";
                                                $message = \frontend\controllers\BaseController::getMessage(26);
                                            }
                                            ?>
                                            <a class="compare red_btn <?= $class ?>"
                                               data-id="<?= $item->id ?>"><?= $message ?></a>
                                            <?php if ($item->new == 1): ?>
                                                <span class="active_element">Новинка</span>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>
    </main>
    <div class="clearfix"></div>

    </main>
    <div class="popup_mod popup_offers" data-popup="popup-shop">
        <div class="popup-inner">
            <div class="popup__shop-block">
                <ul class="popup_list"></ul>
            </div>
            <a class="popup-close" data-popup-close="popup-shop" href=""></a> <a class="popup-close popup-close-mobyl"
                                                                                 data-popup-close="popup-shop"
                                                                                 href=""><?= \frontend\controllers\BaseController::getMessage(65)// повернутися      ?></a>
        </div>
    </div>

<?= \app\components\ShopWidget::widget() ?>