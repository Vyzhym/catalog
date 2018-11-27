<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VideoIndexSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Видео на главной';

?>
<div class="video-index-index">
    <h1><?= Html::encode($this->title) ?></h1>
     <?= Html::a('Изменить', ['update', 'id' => 1], ['class' => 'btn btn-success']) ?>
</div>
