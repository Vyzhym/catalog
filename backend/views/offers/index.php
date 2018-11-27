<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\OffersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Offers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="offers-index">

    <h1><?= "Акции" ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Offers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'title',
            //'title_ru',
            //'description:ntext',
            //'description_ru:ntext',
            // 'link',
            // 'chekbox',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
