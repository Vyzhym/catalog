<?php

use yii\db\Migration;

/**
 * Handles the creation of table `shop`.
 */
class m180601_124857_create_shop_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('shop', [
            'id' => $this->primaryKey(),
            'images' => $this->text(),
            'name' => $this->string(50),
            'link' => $this->string(100),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('shop');
    }
}
