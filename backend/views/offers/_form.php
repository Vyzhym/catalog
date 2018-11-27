<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Offers */
/* @var $form yii\widgets\ActiveForm */
?> <!-- Навигация -->
<ul class="nav nav-tabs mynav" role="tablist">
    <li class="active"><a href="#main" role="tab" data-toggle="tab">Основное</a></li>
    <li><a href="#shops" role="tab" data-toggle="tab">Магазины</a></li>
</ul>


<!-- Содержимое вкладок -->
<div class="tab-content">

    <div role="tabpanel" class="tab-pane active" id="main">

        <div class="offers-form">

            <?php $form = ActiveForm::begin(); ?>
            <div class="row">

                <div class="col-md-4"><h5>Рекомендуемый размер 580*320</h5>  <?= \backend\controllers\ImgController::generateImageField('img', 'offers', 1, $model, $form) ?></div>
            </div>
            <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'title_ru')->textInput(['maxlength' => true]) ?>

            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'description_ru')->textarea(['rows' => 6]) ?>

            <?= $form->field($model, 'pre_description')->textarea(['rows' => 4]) ?>

            <?= $form->field($model, 'pre_description_ru')->textarea(['rows' => 4]) ?>

            <div class="row">
                <div class="col-md-4">
                    <?= $form->field($model, 'chekbox')->dropDownList([
                        '1' => 'Переходить по ссылке',
                        '2' => 'Отображать поп-ап с магазинами где действует акция'
                    ]) ?>
                </div>
            </div>


            <div class="row">
                <div id="link-shop" class="col-md-4">
                    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
                </div>



            </div>




        </div>

    </div>
    <div role="tabpanel" class="tab-pane" id="shops">

        <?php
        $store = \backend\models\Store::find()->asArray()->all();
        $link = json_decode($model->storlink, true);
        foreach ($store as $item){

            echo '
                    <label>
                    '.$item['name'].'
    <input type="text" class="form-control" name="Offers[shops]['.$item['id'].']" value="'.$link[$item['id']]['link'].'" aria-invalid="false"></label> 
                    ';
        }

        ?>
    </div>
</div>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>