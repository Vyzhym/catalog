<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Dish */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dish-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-4">  <?= $form->field($model, 'symbol')->textInput() ?></div>
    </div>
    <div class="row">
        <h5>Рекомендуемый размер 3000*2000</h5>
        <div class="col-md-4">  <?= \backend\controllers\ImgController::generateImageField('image_dish', 'dish', 1, $model, $form) ?></div>
    </div>
    <div class="row">
        <div class="col-md-6"> <?= $form->field($model, 'title_ua')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6">  <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?></div>
    </div>
    <div class="row">
        <div class="col-md-6"><?= $form->field($model, 'type_dish_ua')->textInput(['maxlength' => true]) ?></div>
        <div class="col-md-6"><?= $form->field($model, 'type_dish_ru')->textInput(['maxlength' => true]) ?></div>
    </div>
    <div class="row">

        <div class="col-md-2"><?= $form->field($model, 'preparation_time')->textInput() ?></div>
        <div class="col-md-2"> <?= $form->field($model, 'cooking_time')->textInput() ?></div>
        <div class="col-md-2"> <?= $form->field($model, 'count_person')->textInput() ?></div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <b>Ингридиенты[Ua]</b><br>
            <i>Ингридиент | количество</i>
            <?php $this->registerCss("#ingridients{list-style-type: none;} .count_ingr_ua_add{margin-left:3px} ul li{padding-top:5px} i{font-size:11px} #add{margin-top:10px} #sub{margin-top:50px} .ingridient{width:70%}"); ?>

            <ul id="ingridients">
                <?php
                $ar_ingridients_ua = json_decode($model->ingridients_ua);
                if (empty($ar_ingridients_ua)) {
                    ?>
                    <li><input class="ingridient_ua" type="text" name="ingridient[ua][0]"/>
                        <input class="count_ingr" type="text" name="count_ingr[ua][0]"/></li>
                <?php } else { ?>
                    <?php
                    if ($ar_ingridients_ua != []) {
                        foreach ($ar_ingridients_ua as $id => $item) {
                            ?>
                            <li>
                                <input class="ingridient_ua" type="text" name="ingridient[ua][<?= $id ?>]"
                                       value="<?= htmlspecialchars(($item->ingridient_ua)) ?>"/>
                                <input class="count_ingr_ua" type="text" name="count_ingr[ua][<?= $id ?>]"
                                       value="<?= htmlspecialchars(($item->count_ingr_ua)) ?>"/>
                            </li>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <button id="add" type="button" class="btn btn-warning">добавить</button>
            </ul>
        </div>
        <div class="col-md-6">
            <b>Ингридиенты[Ru]</b><br>
            <i>Ингридиент | количество</i>

            <?php $this->registerCss("#ingridients_ru{list-style-type: none;} .count_ingr_ru_add{margin-left:2px} ul li{padding-top:5px} i{font-size:11px} #add_ru{margin-top:10px} #sub{margin-top:50px} .ingridient{width:70%}"); ?>

            <ul id="ingridients_ru">
                <?php
                $ar_ingridients_ru = json_decode($model->ingridients_ru);
                if (empty($ar_ingridients_ru)) {
                    ?>
                    <li><input class="ingridient_ru" type="text" name="ingridient[ru][0]"/>
                        <input class="count_ingr_ru" type="text" name="count_ingr[ru][0]"/></li>
                <?php } else { ?>
                    <?php
                    if ($ar_ingridients_ru != []) {
                        foreach ($ar_ingridients_ru as $id => $item) {
                            ?>
                            <li>
                                <input class="ingridient_ru" type="text" name="ingridient[ru][<?= $id ?>]"
                                       value="<?= htmlspecialchars(($item->ingridient_ru)) ?>"/>
                                <input class="count_ingr_ru" type="text" name="count_ingr[ru][<?= $id ?>]"
                                       value="<?= htmlspecialchars(($item->count_ingr_ru)) ?>"/>
                            </li>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>
                <button id="add_ru" type="button" class="btn btn-warning">добавить</button>
            </ul>
        </div>
    </div>
    <?= $form->field($model, 'instrucrions_ua')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'instrucrions_ru')->textarea(['rows' => 6]) ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>

<?php
$js = <<<JS
$(document).on('click','#add', function(){
    var id = $('.ingridient_ua').length;
    $('#ingridients li:last').after('<li><input class="ingridient_ua" type="text" name="ingridient[ua]['+id+']" /><input class="count_ingr_ua_add" type="text" name="count_ingr[ua]['+id+']" /></li>');
});

$(document).on('click','#add_ru', function(){
    var id = $('.ingridient_ru').length;
    $('#ingridients_ru li:last').after('<li><input class="ingridient_ru" type="text" name="ingridient[ru]['+id+']" /><input class="count_ingr_ru_add" type="text" name="count_ingr[ru]['+id+']" /></li>');
});

JS;

$this->registerJs($js);
?>
