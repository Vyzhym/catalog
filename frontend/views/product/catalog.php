<?php

use frontend\controllers\BaseController;



$this->title = BaseController::getMessage(118);

?>


<main class="contant">


    <div class="wrapper">

        <div class="breadcrumbs">

            <ul>

                <li>
                    <a href="<?= \yii\helpers\Url::home(); ?>"><?= BaseController::getMessage(37) //Домашня сторінка  ?></a>
                </li>

                <li><a href=""><?= BaseController::getMessage(84) //Каталог ?></a></li>

            </ul>

        </div>

    </div>


    <div class="wrapper">
        <h1 class="title"><?= BaseController::getMessage(173) ?></h1>
        <div class="sidebar">

            <h4 class="sidebar__title"><?= BaseController::getMessage(85) //Фільтри ?></h4>

            <ul class="sidebar__list">

                <li>

                    <label for="input1"><?= BaseController::getMessage(86) //Тип ?></label>

                    <input id="input1" name="filter" type="checkbox">

                    <div class="box-filter">

                        <ul>

                            <li>

                                <label for="box-filter1"><?= BaseController::getMessage(87) //Мультиварка ?></label>

                                <input id="box-filter1" class="check-filter" name="type" value="0" type="checkbox">

                            </li>

                            <li>

                                <label for="box-filter2"><?= BaseController::getMessage(88) //Скороварка ?></label>

                                <input id="box-filter2" class="check-filter" name="type" value="1" type="checkbox">

                            </li>

                        </ul>

                    </div>

                </li>

                <li>

                    <label for="input2"><?= BaseController::getMessage(28) //Потужність ?></label>

                    <input id="input2" name="filter" type="checkbox">

                    <div class="box-filter">

                        <ul>

                            <?php foreach ($power as $item): ?>

                                <?php if (!empty($item['chrkt_power']) && $item['chrkt_power'] != 0): ?>

                                    <li>

                                        <label for="box-filter-chrkt_power<?= $item['chrkt_power'] ?>"><?= $item['chrkt_power'] ?>

                                            Вт</label>

                                        <input id="box-filter-chrkt_power<?= $item['chrkt_power'] ?>"

                                               class="check-filter" name="chrkt_power"

                                               value="<?= $item['chrkt_power'] ?>" type="checkbox">

                                    </li>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </li>

                <li>

                    <label for="input3"><?= BaseController::getMessage(29) //Кількість програм ?></label>

                    <input id="input3" name="filter" type="checkbox">

                    <div class="box-filter">

                        <ul>
                            <?php // $count_program = array_multisort($count_program['chrkt_count_inst_program'])?>
                            <?php foreach ($count_program as $item): ?>

                                <?php if (!empty($item['chrkt_count_inst_program']) && $item['chrkt_count_inst_program'] != 0): ?>


                                    <li>

                                        <label for="box-filter-chrkt_count_inst_program<?= $item['chrkt_count_inst_program'] ?>"><?= $item['chrkt_count_inst_program'] ?>

                                        </label>

                                        <input id="box-filter-chrkt_count_inst_program<?= $item['chrkt_count_inst_program'] ?>"

                                               class="check-filter" name="chrkt_count_inst_program"

                                               value="<?= $item['chrkt_count_inst_program'] ?>" type="checkbox">

                                    </li>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </li>

                <li>

                    <label for="input4"><?= BaseController::getMessage(30) //Об’єм чаші ?></label>

                    <input id="input4" name="filter" type="checkbox">

                    <div class="box-filter">

                        <ul>

                            <?php foreach ($volumes as $item): ?>

                                <?php if (!empty($item['chrkt_volumes']) && $item['chrkt_volumes'] != 0): ?>

                                    <li>

                                        <label for="box-filter-volumes<?= $item['chrkt_volumes'] ?>"><?= $item['chrkt_volumes'] ?>

                                            л</label>

                                        <input id="box-filter-volumes<?= $item['chrkt_volumes'] ?>"

                                               class="check-filter" name="chrkt_volumes"

                                               value="<?= $item['chrkt_volumes'] ?>" type="checkbox">

                                    </li>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </li>

                <li>

                    <label for="input5"><?= BaseController::getMessage(51) //Функції ?></label>

                    <input id="input5" name="filter" type="checkbox">

                    <div class="box-filter">

                        <ul>

                            <li>

                                <label for="box-filter-maint"><?= BaseController::getMessage(53) //Підтримання тепла ?></label>

                                <input id="box-filter-maint" class="check-filter" name="func_maint_of_heat" value="0"
                                       type="checkbox">

                            </li>

                            <li>

                                <label for="box-filter-func_dela_start"><?= BaseController::getMessage(54) //Відкладений старт ?></label>

                                <input id="box-filter-func_dela_start" class="check-filter" name="func_dela_start"
                                       value="0" type="checkbox">

                            </li>

                        </ul>

                    </div>

                </li>


                <li>

                    <label for="input7"><?= BaseController::getMessage(52) //Мультишеф ?></label>

                    <input id="input7" name="filter" type="checkbox">

                    <div class="box-filter">

                        <ul>

                            <li>

                                <label for="box-filter-multisheff"><?= BaseController::getMessage(19) //Так ?></label>

                                <input id="box-filter-multisheff" class="check-filter" name="func_multisheff" value="1"
                                       type="checkbox">

                            </li>



                            <li>

                                <label for="box-filter-multisheff1"><?= BaseController::getMessage(20) //Ні ?></label>

                                <input id="box-filter-multisheff1" class="check-filter" name="func_multisheff" value="0"
                                       type="checkbox">

                            </li>

                        </ul>

                    </div>

                </li>

                <li>

                    <label for="input8"><?= BaseController::getMessage(89) //Йогурт ?></label>

                    <input id="input8" name="filter" type="checkbox">

                    <div class="box-filter">

                        <ul>

                            <li>

                                <label for="box-filter-yogurt"><?= BaseController::getMessage(19) //Так ?></label>

                                <input id="box-filter-yogurt" class="check-filter" name="modes_yogurt" value="1"
                                       type="checkbox">

                            </li>

                            <li>

                                <label for="box-filter-yogurt1"><?= BaseController::getMessage(20) //Ні ?></label>

                                <input id="box-filter-yogurt1" class="check-filter" name="modes_yogurt" value="0"
                                       type="checkbox">

                            </li>

                        </ul>

                    </div>

                </li>

                <li>

                    <label for="input9"><?= BaseController::getMessage(55) //Книга рецептів ?></label>

                    <input id="input9" name="filter" type="checkbox">

                    <div class="box-filter">

                        <ul>

                            <?php
                           sort($recipies);

                            foreach ($recipies as $item): ?>

                                <?php if (!empty($item['func_book_of_recipes']) && $item['func_book_of_recipes'] != 0): ?>

                                    <li>

                                        <label for="box-filter-func_book_of_recipes<?= $item['func_book_of_recipes'] ?>"><?= $item['func_book_of_recipes'] ?></label>

                                        <input id="box-filter-func_book_of_recipes<?= $item['func_book_of_recipes'] ?>"

                                               class="check-filter" name="func_book_of_recipes"

                                               value="<?= $item['func_book_of_recipes'] ?>" type="checkbox">

                                    </li>

                                <?php endif; ?>

                            <?php endforeach; ?>

                        </ul>

                    </div>

                </li>

            </ul>

        </div>


        <div class="category__content">

            <div class="category__content-sorter">

                <div class="category__content-mode">

                    <div class="view-mode view-col active"></div>

                    <div class="view-mode view-row"></div>

                </div>

                <div class="sort-content">

                    <div class="sort-content-checked"><?= BaseController::getMessage(90) //Сортувати ?></div>

                    <ul class="sort-list">

                        <li>

                            <label for="sort"><?= BaseController::getMessage(91) //Спочатку популярні ?></label>

                            <input id="sort" class="check-filter sort-ch" name="sort" value="popular DESC"
                                   type="checkbox">

                        </li>

                        <li>

                            <label for="sort1"><?= BaseController::getMessage(92) //Спочатку дешеві ?></label>

                            <input id="sort1" class="check-filter sort-ch" name="sort" value="price ASC"
                                   type="checkbox">

                        </li>

                        <li>

                            <label for="sort2"><?= BaseController::getMessage(93) //Спочатку дорогі ?></label>

                            <input id="sort2" class="check-filter sort-ch" name="sort" value="price DESC"
                                   type="checkbox">

                        </li>

                    </ul>


                </div>

            </div>


            <div class="category__content-list">


                <?= $this->render('_product', ['product' => $product]) ?>


            </div>

        </div>

    </div>


</main>

<div class="clearfix"></div>

    </main><div class="popup_mod popup_offers" data-popup="popup-shop">    <div class="popup-inner">            <div class="popup__shop-block">             <ul class="popup_list">            </ul>        </div>        <a class="popup-close" data-popup-close="popup-shop" href=""></a>        <a class="popup-close popup-close-mobyl" data-popup-close="popup-shop" href=""><?= \frontend\controllers\BaseController::getMessage(65)// повернутися  ?></a>    </div></div>

<?= \app\components\ShopWidget::widget() ?>