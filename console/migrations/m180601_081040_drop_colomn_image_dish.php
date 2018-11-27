<?php

use yii\db\Migration;

class m180601_081040_drop_colomn_image_dish extends Migration
{
    public function safeUp()
    {
        $this->dropColumn('dish', 'image_dish');
        $this->addColumn('dish', 'images', $this->text());
    }

    public function safeDown()
    {
        $this->dropColumn('dish', 'images');
        $this->addColumn('dish', 'image_dish', $this->text());
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180601_081040_drop_colomn_image_dish cannot be reverted.\n";

        return false;
    }
    */
}
