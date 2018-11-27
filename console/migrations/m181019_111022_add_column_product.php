<?php

use yii\db\Migration;

class m181019_111022_add_column_product extends Migration
{
    public function safeUp()
    {
        $this->addColumn('product', 'advantages', $this->text());
    }

    public function safeDown()
    {
        $this->dropColumn('product', 'advantages');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181019_111022_add_column_product cannot be reverted.\n";

        return false;
    }
    */
}
