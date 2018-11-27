<?php

use \frontend\controllers\BaseController;

$this->title = BaseController::getMessage(38);

?>

<meta name="viewport" content="width=900" ,="" initial-scale="0," user-scalable="no">

<main class="contant">



    <div class="wrapper">

        <div class="breadcrumbs">

            <ul>

                <li><a href="<?= \yii\helpers\Url::home();?>"><?= BaseController::getMessage(37) //Домашня сторінка ?></a></li>

                <li><a href=""><?= BaseController::getMessage(25)//Порівняти?></a></li>

            </ul>

        </div>

    </div>



    <section class="compare">

        <div class="wrapper">

            <h1 class="compare__tovars-title"><?= BaseController::getMessage(38)//Порівняти товари ?></h1>

        </div>

    </section>

    <section class="compare__table">

        <div class="wrapper">

            <table>

                <tbody>

                <tr class="tr__tovars-inners">

                    <td class="empty_table"></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="compare_td">

                            <div class="compare__tovars-block">

                                <a href="" class="delete-block dell_block" data-id="<?= $compare_product[0]->id ?>"></a>

                                <div class="compare__tovars-inner">

                                    <img src="/images/<?= $compare_product[0]->images->img ?>" alt="<?= $compare_product[0]->description_title ?>" title="<?= $compare_product[0]->description_title ?>">

                                    <div class="inner-btn"><a data-id="<?= $compare_product[0]->id ?>" class="whare_buy red_btn popap_shops_btn compare_table_btn"><?= BaseController::getMessage(5)//Де придбати ?></a></div>

                                </div>

                                <div class="compare__tovars-price"><?= ($compare_product[0]->price != '')?$compare_product[0]->price:'&nbsp;' ?></span><?= ($compare_product[0]->price != '')?" грн":'&nbsp;' ?></span>

                                </div>

                            </div>

                        </td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="compare_td">

                            <div class="compare__tovars-block">

                                <a href="" class="delete-block dell_block" data-id="<?= $compare_product[1]->id ?>"></a>

                                <div class="compare__tovars-inner">

                                    <img src="/images/<?= $compare_product[1]->images->img ?>" alt="<?= $compare_product[1]->description_title ?>" title="<?= $compare_product[1]->description_title ?>">

                                    <div class="inner-btn"><a data-id="<?= $compare_product[1]->id ?>" class="whare_buy red_btn popap_shops_btn compare_table_btn"><?= BaseController::getMessage(5)//Де придбати ?></a></div>

                                </div>

                                <div class="compare__tovars-price"><?= ($compare_product[1]->price != '')?$compare_product[1]->price:'&nbsp;' ?></span><?= ($compare_product[1]->price != '')?" грн":'&nbsp;' ?></span>

                                </div>

                            </div>

                        </td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="compare_td">

                            <div class="compare__tovars-block">

                                <a href="" class="delete-block dell_block" data-id="<?= $compare_product[2]->id ?>"></a>

                                <div class="compare__tovars-inner">

                                    <img src="/images/<?= $compare_product[2]->images->img ?>" alt="<?= $compare_product[2]->description_title ?>" title="<?= $compare_product[2]->description_title ?>">

                                    <div class="inner-btn"><a data-id="<?= $compare_product[2]->id ?>" class="whare_buy red_btn popap_shops_btn compare_table_btn"><?= BaseController::getMessage(5)//Де придбати ?></a></div>

                                </div>

                                <div class="compare__tovars-price"><?= ($compare_product[2]->price != '')?$compare_product[2]->price:'&nbsp;' ?></span><?= ($compare_product[2]->price != '')?" грн":'&nbsp;' ?></span>

                                </div>

                            </div>

                        </td>

                    <?php endif; ?>

                </tr>

                <tr class="tr-compare_title">

                    <td colspan="5">

                        <h2 class="compare_title"><?= BaseController::getMessage(39)//Технічні характеристики ?></h2>

                    </td>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(27)//Модель?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_model ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_model ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_model ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(30)//Об’єм ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_volumes ?> л</td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_volumes ?> л</td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_volumes ?> л</td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(28)//Потужність ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_power ?> Вт</td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_power ?> Вт</td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_power ?> Вт</td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(40)//Матеріал чаші ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_bowl_material ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_bowl_material ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_bowl_material ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(41)//Матеріал корпусу ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_body_material ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_body_material ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_body_material ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(42)//Дисплей ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_display ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_display ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_display ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(43)//Кількість встановлених програм ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_count_inst_program ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_count_inst_program ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_count_inst_program ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(44)//Кількість програм ручної настройки ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_count_hand_program ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_count_hand_program ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_count_hand_program ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(45)//Готування під тиском ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item "><?= $compare_product[0]->chrkt_cooker_press === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item "><?= $compare_product[1]->chrkt_cooker_press === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item "><?= $compare_product[2]->chrkt_cooker_press === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(46)//Регулювання температури ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_temperat_control === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_temperat_control === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_temperat_control === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(47)//Регулювання часу ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_time_control ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_time_control ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_time_control ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(48)//Вибір типу продукту ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_select_type_produkt === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_select_type_produkt === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_select_type_produkt === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(49)//Кількість нагрівальних елементів ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_count_heating_elements ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_count_heating_elements ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_count_heating_elements ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(50)//Кількість температурних датчиків ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->chrkt_count_heating_sensors ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->chrkt_count_heating_sensors ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->chrkt_count_heating_sensors ?></td>

                    <?php endif; ?>

                </tr>

                </tbody>

            </table>



            <h2 class="compare_title"><?= BaseController::getMessage(51)//Функції ?></h2>



            <table>

                <tbody>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(52)//Мультишеф ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->func_multisheff === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->func_multisheff === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->func_multisheff === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(53)//Підтримання тепла ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->func_maint_of_heat ?> <?= BaseController::getMessage(21) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->func_maint_of_heat ?> <?= BaseController::getMessage(21) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->func_maint_of_heat ?> <?= BaseController::getMessage(21) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(54)//Відкладений старт ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->func_dela_start ?> <?= BaseController::getMessage(21) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->func_dela_start ?> <?= BaseController::getMessage(21) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->func_dela_start ?> <?= BaseController::getMessage(21) ?></td>

                    <?php endif; ?>

                </tr>



                <tr>

                    <td class="name-option"><?= BaseController::getMessage(55)//Книга рецептів ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->func_book_of_recipes ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->func_book_of_recipes?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->func_book_of_recipes?></td>

                    <?php endif; ?>

                </tr>

                </tbody>

            </table>



            <h2 class="compare_title"><?= BaseController::getMessage(56)//Режими ?></h2>



            <table>

                <tbody>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(57)//Приготування каш ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->modes_cash === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->modes_cash === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->modes_cash === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(58)//Приготування супів ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->modes_soup === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->modes_soup === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->modes_soup === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(59)//Випічка ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->modes_vypichka === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->modes_vypichka === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->modes_vypichka === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(60)//Приготування йогурту ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->modes_yogurt === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->modes_yogurt === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->modes_yogurt === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(61)//Дитяче меню ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->modes_child === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->modes_child === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->modes_child === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(62)//Тушкування ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->modes_tushk === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->modes_tushk === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->modes_tushk === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(63)//Варка на пару ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->modes_varka === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->modes_varka === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->modes_varka === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                <tr>

                    <td class="name-option"><?= BaseController::getMessage(64)//Підсмажування ?></td>

                    <?php if (isset($compare_product[0])): ?>

                        <td class="first-item compare-item"><?= $compare_product[0]->modes_pidsmazh === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[1])): ?>

                        <td class="second-item compare-item"><?= $compare_product[1]->modes_pidsmazh === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                    <?php if (isset($compare_product[2])): ?>

                        <td class="third-item compare-item"><?= $compare_product[2]->modes_pidsmazh === 1 ? BaseController::getMessage(19) : BaseController::getMessage(20) ?></td>

                    <?php endif; ?>

                </tr>

                </tbody>

            </table>

        </div>

    </section>



</main>





<div class="clearfix"></div>

    </main><div class="popup_mod popup_offers" data-popup="popup-shop">    <div class="popup-inner">            <div class="popup__shop-block">             <ul class="popup_list">            </ul>        </div>        <a class="popup-close" data-popup-close="popup-shop" href=""></a>        <a class="popup-close popup-close-mobyl" data-popup-close="popup-shop" href=""><?= \frontend\controllers\BaseController::getMessage(65)// повернутися  ?></a>    </div></div>



<?= \app\components\ShopWidget::widget() ?>