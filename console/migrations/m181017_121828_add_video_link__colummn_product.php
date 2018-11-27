<?php

use yii\db\Migration;

class m181017_121828_add_video_link__colummn_product extends Migration
{
    public function safeUp()
    {
        $this->addColumn('product', 'video_link', $this->string());
    }

    public function safeDown()
    {
        $this->dropColumn('product', 'video_link');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181017_121828_add_video_link__colummn_product cannot be reverted.\n";

        return false;
    }
    */
}
