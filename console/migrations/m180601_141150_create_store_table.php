<?php

use yii\db\Migration;

/**
 * Handles the creation of table `store`.
 */
class m180601_141150_create_store_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('store', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100),
            'shop_link' => $this->string(100),
            'images' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('store');
    }
}
