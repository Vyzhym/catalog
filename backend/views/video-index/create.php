<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\VideoIndex */

$this->title = 'Create Video Index';
$this->params['breadcrumbs'][] = ['label' => 'Video Indices', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="video-index-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
