<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Advantage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="advantage-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'text')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'text_ru')->textInput(['maxlength' => true]) ?>


    <div class="row">

        <div class="col-md-4">  <?= \backend\controllers\ImgController::generateImageField('imageIcons', 'advantage', 1, $model, $form) ?></div>
    </div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
