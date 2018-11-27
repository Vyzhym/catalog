<?php

use yii\db\Migration;

/**
 * Handles the creation of table `slider`.
 */
class m180601_115432_create_slider_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('slider', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100),
            'title_ru' => $this->string(100),
            'description' => $this->text(),
            'description_ru' => $this->text(),
            'images' => $this->text(),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('slider');
    }
}
