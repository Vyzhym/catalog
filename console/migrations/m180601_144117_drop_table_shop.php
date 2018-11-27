<?php

use yii\db\Migration;

class m180601_144117_drop_table_shop extends Migration
{
    public function safeUp()
    {
        $this->dropTable('shop');
    }

    public function safeDown()
    {
        echo "m180601_144117_drop_table_shop cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180601_144117_drop_table_shop cannot be reverted.\n";

        return false;
    }
    */
}
