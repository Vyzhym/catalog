<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\DishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dishes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-index">

    <h1>Блюда</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать блюдо', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_ua',
            'title_ru',
            //'image_dish',
            //'type_dish_ua',
            // 'type_dish_ru',
            // 'preparation_time:datetime',
            // 'cooking_time:datetime',
            // 'count_person',
            // 'ingridients_ua:ntext',
            // 'ingridients_ru:ntext',
            // 'instrucrions_ua:ntext',
            // 'instrucrions_ru:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
