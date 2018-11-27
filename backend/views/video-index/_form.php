<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\VideoIndex */
/* @var $form yii\widgets\ActiveForm */
?>

    <div class="video-index-form">

        <?php $form = ActiveForm::begin(); ?>

        <ul id="videoindex" style="margin-left:0; padding-left:0">
            <li style="list-style-type: none">
                <div class="form-group field-videoindex-video_link">
                    <label class="control-label" for="videoindex-video_link">Ccылки на видео</label>
                    <?php $arr_links = json_decode($model->video_link);
                    if (empty($arr_links)) :
                        ?>
                        <input type="text" id="videoindex-video_link" class="form-control" name="link[0]"
                               value="" maxlength="50">
                    <?php else:
                        if ($arr_links != []) :
                            foreach ($arr_links as $id => $item) : ?>
                                <input type="text" id="videoindex-video_link<?= $id ?>" class="form-control"
                                       name="link[<?= $id ?>]"
                                       value="<?= $item ?>" maxlength="50">
                                <div class="help-block"></div>
                                <?php
                            endforeach;
                        endif;

                    endif; ?>
                </div>
            </li>
            <button id="add" type="button" class="btn btn-info">Добавить</button>
        </ul>

        <div class="row">

            <div class="col-md-4">
                <h4>Картинка на фоне кнопки плей:</h4>
                <h5>Рекомендуемое соотношение сторон изображения 1000:370</h5>
                <?= \backend\controllers\ImgController::generateImageField('img', 'video-index', 1, $model, $form) ?>
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
    var id = $('.form-control').length;
    $('#videoindex li:last').after('<li style="list-style-type: none"><input class="form-control" type="text" name="link['+id+']"/> <div class="help-block"></div>');
});

JS;

$this->registerJs($js);
?>