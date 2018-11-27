<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

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
            'title_product:ntext',
            'title_product_ru:ntext',
            'price',
            'images:ntext',
            'description_product:ntext',
            'description_product_ru:ntext',
            'description_title:ntext',
            'description_title_ru:ntext',
            'chrkt_model',
            'chrkt_volumes',
            'chrkt_power',
            'chrkt_bowl_material',
            'chrkt_bowl_material_ru',
            'chrkt_body_material',
            'chrkt_body_material_ru',
            'chrkt_display',
            'chrkt_count_inst_program',
            'chrkt_count_hand_program',
            'chrkt_cooker_press',
            'chrkt_temperat_control',
            'chrkt_time_control:datetime',
            'chrkt_select_type_produkt',
            'chrkt_count_heating_elements',
            'chrkt_count_heating_sensors',
            'func_multisheff',
            'func_maint_of_heat',
            'func_dela_start',
            'func_book_of_recipes',
            'modes_cash',
            'modes_soup',
            'modes_yogurt',
            'modes_child',
            'modes_tushk',
            'modes_varka',
            'modes_vypichka',
            'modes_pidsmazh',
        ],
    ]) ?>

</div>
