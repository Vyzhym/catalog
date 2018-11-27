<?php

use yii\db\Migration;

class m180919_092722_add_column_product extends Migration
{
    public function safeUp()
    {
        $this->addColumn('product', 'new', $this->integer()->defaultValue('0'));
    }

    public function safeDown()
    {
        $this->dropColumn('product', 'new');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180919_092722_add_column_product cannot be reverted.\n";

        return false;
    }
    */
}
