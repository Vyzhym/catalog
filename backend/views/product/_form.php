<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>
    <!-- Навигация -->
    <ul class="nav nav-tabs mynav" role="tablist">
        <li class="active"><a href="#main" role="tab" data-toggle="tab">Основное</a></li>
        <li><a href="#image" role="tab" data-toggle="tab">Картинки</a></li>
        <li><a href="#doc" role="tab" data-toggle="tab">Документация</a></li>
        <li><a href="#chrkt" role="tab" data-toggle="tab">Характеристики</a></li>
        <li><a href="#func" role="tab" data-toggle="tab">Функции</a></li>
        <li><a href="#modes" role="tab" data-toggle="tab">Режимы</a></li>
        <li><a href="#shops" role="tab" data-toggle="tab">Магазины</a></li>
    </ul>


    <!-- Содержимое вкладок -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="main">
            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'symbol')->textarea(['rows' => 1]) ?>
                </div>

            </div>
            <div class="row">

                <div class="col-md-2">
                    <?= $form->field($model, 'new')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'video_link')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-1">
                    <?php
                    $mass = yii\helpers\ArrayHelper::map(\backend\models\Advantage::find()->all(), 'id', 'text');
                    $params =  [

                        'multiple'=>'multiple'
                    ];
                    ?>
                    <?= $form->field($model, 'advantages')->dropDownList($mass, $params); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'title_product')->textarea(['rows' => 1]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'title_product_ru')->textarea(['rows' => 1]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'description_title')->textarea(['rows' => 1]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'description_title_ru')->textarea(['rows' => 1]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'description_product')->textarea(['rows' => 6]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'description_product_ru')->textarea(['rows' => 6]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'type')->dropDownList(['0' => 'Мультиварка', '1' => 'Скороварка']); ?>
                </div>
                <div class="col-md-2">
                    <?= $form->field($model, 'popular')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'pdish')->widget(\kartik\select2\Select2::classname(), [
                        'data' => \yii\helpers\ArrayHelper::map(\backend\models\Dish::find()->all(), 'title_ua', 'title_ua'),
                        'options' => ['placeholder' => 'Блюда', 'multiple' => true],
                        'pluginOptions' => [
                            'tags' => true,
                            'tokenSeparators' => [',', ' '],
                            'maximumInputLength' => 10
                        ],
                    ])->label('Выберите название блюда'); ?>

                </div>


            </div>


            <div class="row">
                <div class="col-md-6">
                    <b>Вопросы-ответы[Ua]</b><br>
                    <i>Вопрос | ответ</i>
                    <?php $this->registerCss("#questions{list-style-type: none;} .answer_quest_ua_add{margin-left:3px} ul li{padding-top:5px} i{font-size:11px} #add{margin-top:10px} #sub{margin-top:50px} .question{width:70%}"); ?>

                    <ul id="questions">
                        <?php
                        $ar_questions_ua = json_decode($model->questions_ua);
                        if (empty($ar_questions_ua)) {
                            ?>
                            <li><input class="question_ua" type="text" name="question[ua][0]"/>
                                <input class="answer_quest" type="text" name="answer_quest[ua][0]"/></li>
                        <?php } else { ?>
                            <?php
                            if ($ar_questions_ua != []) {
                                foreach ($ar_questions_ua as $id => $item) {
                                    ?>
                                    <li>
                                        <input class="question_ua" type="text" name="question[ua][<?= $id ?>]"
                                               value="<?= htmlspecialchars(($item->question_ua)) ?>"/>
                                        <input class="answer_quest_ua" type="text" name="answer_quest[ua][<?= $id ?>]"
                                               value="<?= htmlspecialchars(($item->answer_quest_ua)) ?>"/>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <button id="add" type="button" class="btn btn-warning">добавить</button>
                    </ul>
                </div>
                <div class="col-md-6">
                    <b>Вопросы-ответы[Ru]</b><br>
                    <i>Вопрос | ответ</i>

                    <?php $this->registerCss("#questions_ru{list-style-type: none;} .answer_quest_ru_add{margin-left:2px} ul li{padding-top:5px} i{font-size:11px} #add_ru{margin-top:10px} #sub{margin-top:50px} .question{width:70%}"); ?>

                    <ul id="questions_ru">
                        <?php
                        $ar_questions_ru = json_decode($model->questions_ru);
                        if (empty($ar_questions_ru)) {
                            ?>
                            <li><input class="question_ru" type="text" name="question[ru][0]"/>
                                <input class="answer_quest_ru" type="text" name="answer_quest[ru][0]"/></li>
                        <?php } else { ?>
                            <?php
                            if ($ar_questions_ru != []) {
                                foreach ($ar_questions_ru as $id => $item) {
                                    ?>
                                    <li>
                                        <input class="question_ru" type="text" name="question[ru][<?= $id ?>]"
                                               value="<?= htmlspecialchars(($item->question_ru)) ?>"/>
                                        <input class="answer_quest_ru" type="text" name="answer_quest[ru][<?= $id ?>]"
                                               value="<?= htmlspecialchars(($item->answer_quest_ru)) ?>"/>
                                    </li>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <button id="add_ru" type="button" class="btn btn-warning">добавить</button>
                    </ul>
                </div>

            </div>
        </div>


        <div role="tabpanel" class="tab-pane" id="image">
            <div class="row">
                <div class="col-md-4">
                    <h5>Рекомендуемый размер 322*340</h5>
                    <?= \backend\controllers\ImgController::generateImageField('img', 'product', 1, $model, $form) ?>

                </div>
                <div class="col-md-4">
                    <h5>Рекомендуемый размер 80*106</h5>
                    <?= \backend\controllers\ImgController::generateImageField('honors', 'product', 3, $model, $form) ?>
                </div>

                <div class="row">
                    <div class="col-md-7">
                        <?= \backend\controllers\FileUploadController::generateMultiImagesFields('imageDetail', 'product', 2, $model, $form) ?>
                    </div>
                </div>

            </div>


        </div>

        <div role="tabpanel" class="tab-pane" id="doc">
            <div class="row">
                <div class="col-md-4 col-xs-12">
                    <?= \backend\controllers\ImgController::generateImageField('instruction', 'product', 6, $model, $form) ?>
                </div>
                <div class="col-md-4 col-xs-12">
                    <?= \backend\controllers\ImgController::generateImageField('guarantee', 'product', 5, $model, $form) ?>
                </div>
                <div class="col-md-4 col-xs-12">
                    <?= \backend\controllers\ImgController::generateImageField('recipies', 'product', 4, $model, $form) ?>
                </div>
            </div>
        </div>


        <div role="tabpanel" class="tab-pane" id="chrkt">

            <?= $form->field($model, 'chrkt_model')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'chrkt_volumes')->textInput() ?>

            <?= $form->field($model, 'chrkt_power')->textInput() ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'chrkt_bowl_material')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'chrkt_bowl_material_ru')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'chrkt_body_material')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'chrkt_body_material_ru')->textInput(['maxlength' => true]) ?>
                </div>
            </div>
            <?= $form->field($model, 'chrkt_display')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'chrkt_count_inst_program')->textInput() ?>

            <?= $form->field($model, 'chrkt_count_hand_program')->textInput() ?>

            <?= $form->field($model, 'chrkt_cooker_press')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

            <?= $form->field($model, 'chrkt_temperat_control')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

            <?= $form->field($model, 'chrkt_time_control')->textInput() ?>

            <?= $form->field($model, 'chrkt_select_type_produkt')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

            <?= $form->field($model, 'chrkt_count_heating_elements')->textInput() ?>

            <?= $form->field($model, 'chrkt_count_heating_sensors')->textInput() ?>

            <?= $form->field($model, 'chrkt_auto_par')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

            <?= $form->field($model, 'chrkt_nitro_par')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

            <?= $form->field($model, 'chrkt_teksture')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="func">
            <?= $form->field($model, 'func_multisheff')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>

            <?= $form->field($model, 'func_maint_of_heat')->textInput() ?>

            <?= $form->field($model, 'func_dela_start')->textInput() ?>

            <?= $form->field($model, 'func_book_of_recipes')->textInput() ?>

        </div>

        <div role="tabpanel" class="tab-pane" id="modes">
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_cash')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_soup')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_yogurt')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_child')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_tushk')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_varka')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_vypichka')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_pidsmazh')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'modes_tisto')->dropDownList(['0' => 'Нет', '1' => 'Да']); ?>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="shops">

            <?php
            $store = \backend\models\Store::find()->asArray()->all();
            $link = json_decode($model->storlink, true);

            foreach ($store as $item) {

                echo '
                    <label>
                    ' . $item['name'] . '
    <input type="text" class="form-control" name="Product[shops][' . $item['id'] . ']" value="' . $link[$item['id']]['link'] . '" aria-invalid="false"></label> 
                    ';
            }

            ?>
        </div>
    </div>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<JS
$(document).on('click','#add', function(){
    var id = $('.question_ua').length;
    $('#questions li:last').after('<li><input class="question_ua" type="text" name="question[ua]['+id+']" /><input class="answer_quest_ua_add" type="text" name="answer_quest[ua]['+id+']" /></li>');
});

$(document).on('click','#add_ru', function(){
    var id = $('.question_ru').length;
    $('#questions_ru li:last').after('<li><input class="question_ru" type="text" name="question[ru]['+id+']" /><input class="answer_quest_ru_add" type="text" name="answer_quest[ru]['+id+']" /></li>');
});
$(document).ready(function() {
        $('#product-advantages').multiselect({
        numberDisplayed: 1,
        });
        
    });
JS;

$this->registerJs($js);
?>

