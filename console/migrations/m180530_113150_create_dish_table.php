<?php

use yii\db\Migration;

/**
 * Handles the creation of table `dish`.
 */
class m180530_113150_create_dish_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('dish', [
            'id' => $this->primaryKey(),
            'title_ua' => $this->string(100)->notNull(),
            'title_ru' => $this->string(100)->notNull(),
            'image_dish' => $this->string(100)->notNull(),
            'type_dish_ua' => $this->string(30)->notNull(),
            'type_dish_ru' => $this->string(30)->notNull(),
            'preparation_time' => $this->integer(),
            'cooking_time' => $this->integer(),
            'count_person' => $this->integer(),
            'ingridients_ua' => $this->text(),
            'ingridients_ru' => $this->text(),
            'instrucrions_ua' => $this->text(),
            'instrucrions_ru' => $this->text(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('dish');
    }
}
