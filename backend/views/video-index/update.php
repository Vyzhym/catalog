<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\VideoIndex */

/*$this->title = 'Update Video Index: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Video Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';*/
?>
<div class="video-index-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
