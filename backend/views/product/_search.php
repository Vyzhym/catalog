<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title_product') ?>

    <?= $form->field($model, 'title_product_ru') ?>

    <?= $form->field($model, 'price') ?>

    <?= $form->field($model, 'images') ?>

    <?php // echo $form->field($model, 'description_product') ?>

    <?php // echo $form->field($model, 'description_product_ru') ?>

    <?php // echo $form->field($model, 'description_title') ?>

    <?php // echo $form->field($model, 'description_title_ru') ?>

    <?php // echo $form->field($model, 'chrkt_model') ?>

    <?php // echo $form->field($model, 'chrkt_volumes') ?>

    <?php // echo $form->field($model, 'chrkt_power') ?>

    <?php // echo $form->field($model, 'chrkt_bowl_material') ?>

    <?php // echo $form->field($model, 'chrkt_bowl_material_ru') ?>

    <?php // echo $form->field($model, 'chrkt_body_material') ?>

    <?php // echo $form->field($model, 'chrkt_body_material_ru') ?>

    <?php // echo $form->field($model, 'chrkt_display') ?>

    <?php // echo $form->field($model, 'chrkt_count_inst_program') ?>

    <?php // echo $form->field($model, 'chrkt_count_hand_program') ?>

    <?php // echo $form->field($model, 'chrkt_cooker_press') ?>

    <?php // echo $form->field($model, 'chrkt_temperat_control') ?>

    <?php // echo $form->field($model, 'chrkt_time_control') ?>

    <?php // echo $form->field($model, 'chrkt_select_type_produkt') ?>

    <?php // echo $form->field($model, 'chrkt_count_heating_elements') ?>

    <?php // echo $form->field($model, 'chrkt_count_heating_sensors') ?>

    <?php // echo $form->field($model, 'func_multisheff') ?>

    <?php // echo $form->field($model, 'func_maint_of_heat') ?>

    <?php // echo $form->field($model, 'func_dela_start') ?>

    <?php // echo $form->field($model, 'func_book_of_recipes') ?>

    <?php // echo $form->field($model, 'modes_cash') ?>

    <?php // echo $form->field($model, 'modes_soup') ?>

    <?php // echo $form->field($model, 'modes_yogurt') ?>

    <?php // echo $form->field($model, 'modes_child') ?>

    <?php // echo $form->field($model, 'modes_tushk') ?>

    <?php // echo $form->field($model, 'modes_varka') ?>

    <?php // echo $form->field($model, 'modes_vypichka') ?>

    <?php // echo $form->field($model, 'modes_pidsmazh') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
