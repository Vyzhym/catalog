<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Dish */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dishes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dish-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title_ua',
            'title_ru',
            'image_dish',
            'type_dish_ua',
            'type_dish_ru',
            'preparation_time:datetime',
            'cooking_time:datetime',
            'count_person',
            'ingridients_ua:ntext',
            'ingridients_ru:ntext',
            'instrucrions_ua:ntext',
            'instrucrions_ru:ntext',
        ],
    ]) ?>

</div>
