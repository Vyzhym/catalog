<?php

namespace backend\controllers;

use backend\models\Img;
use Yii;
use backend\models\News;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * MainController implements the CRUD actions for MainCheck model.
 */
class ImgController extends AppController
{

    public function actionDelimg($model, $id)
    {
        $image = $model->getImage();
        $model->removeImage($image);
        return $this->redirect(['update', 'id' => $model->id]);
    }

    public function actionDelimgseveral($model, $c)
    {
        $images = $model->getImages();
        $model->removeImage($images[$c]);
        return $this->redirect(['update', 'id' => $model->id]);
    }

    public static function generateImageField($field, $modelName, $arrModelId, $model, $form)
    {

        $html = "<div style='border:2px solid #000; padding:5px;margin-top:5px;margin-bottom:5px'>";
        if (!empty($model->images->$field)) {
            $html .= $form->field($model, $field)->fileInput();
            $html .= "<img src='/images/{$model->images->$field}' alt='' style='max-width: 100%'><br>";
            $html .= "{$model->images->$field}<br>";
            $html .= "<a href='" . Url::to(["{$modelName}/delimage", 'img' => base64_encode(implode("|", [$model->images->$field, $model->id, $arrModelId]))]) . "'>Удалить</a>";
        } else {
            $html .= $form->field($model, $field)->fileInput();
        }
        $html .= "</div>";
        return $html;
    }

    public static function generateMultiImagesFields($field, $modelName, $arrModelId, $model, $form)
    {
        $html = "<div style='border:2px solid #000; padding:5px;margin-top:5px;margin-bottom:5px'>";
        $html .= $form->field($model, "{$field}[]")->fileInput(['multiple' => true, 'accept' => 'image/*']);

        if (!empty($model->images->$field)):
            $html .= "<table>";
            foreach ($model->images->$field as $item):
                $html .= " <tr style='display: inline;'>";
                $html .= "<td style='padding: 10px'>";
                $html .= "<img src='/images/{$item}' alt='' style='max-width: 200px; max-height: 200px'>";
                $html .= "<br>";
                $html .= "<a href='" . Url::to(["{$modelName}/delimage", 'img' => base64_encode(implode("|", [$item, $model->id, $arrModelId]))]) . "'>Удалить</a>";

                $html .= "</td>";
                $html .= "</tr>";
            endforeach;
            $html .= "</table>";
        endif;
        $html .= "</div>";
        return $html;
    }

}