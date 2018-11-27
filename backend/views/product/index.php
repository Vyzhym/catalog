<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title_product:ntext',
            //'title_product_ru:ntext',
            'price',
            //'type',
            //'images:ntext',
            // 'description_product:ntext',
            // 'description_product_ru:ntext',
            // 'description_title:ntext',
            // 'description_title_ru:ntext',
            // 'chrkt_model',
            // 'chrkt_volumes',
            // 'chrkt_power',
            // 'chrkt_bowl_material',
            // 'chrkt_bowl_material_ru',
            // 'chrkt_body_material',
            // 'chrkt_body_material_ru',
            // 'chrkt_display',
            // 'chrkt_count_inst_program',
            // 'chrkt_count_hand_program',
            // 'chrkt_cooker_press',
            // 'chrkt_temperat_control',
            // 'chrkt_time_control:datetime',
            // 'chrkt_select_type_produkt',
            // 'chrkt_count_heating_elements',
            // 'chrkt_count_heating_sensors',
            // 'func_multisheff',
            // 'func_maint_of_heat',
            // 'func_dela_start',
            // 'func_book_of_recipes',
            // 'modes_cash',
            // 'modes_soup',
            // 'modes_yogurt',
            // 'modes_child',
            // 'modes_tushk',
            // 'modes_varka',
            // 'modes_vypichka',
            // 'modes_pidsmazh',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
