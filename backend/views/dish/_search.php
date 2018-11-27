<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\DishSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dish-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_ua') ?>

    <?= $form->field($model, 'title_ru') ?>

    <?= $form->field($model, 'image_dish') ?>

    <?= $form->field($model, 'type_dish_ua') ?>

    <?php // echo $form->field($model, 'type_dish_ru') ?>

    <?php // echo $form->field($model, 'preparation_time') ?>

    <?php // echo $form->field($model, 'cooking_time') ?>

    <?php // echo $form->field($model, 'count_person') ?>

    <?php // echo $form->field($model, 'ingridients_ua') ?>

    <?php // echo $form->field($model, 'ingridients_ru') ?>

    <?php // echo $form->field($model, 'instrucrions_ua') ?>

    <?php // echo $form->field($model, 'instrucrions_ru') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
