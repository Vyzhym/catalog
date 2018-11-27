<?php

use yii\db\Migration;

class m181019_095717_add_table_advantage extends Migration
{
    public function safeUp()
    {
        $this->createTable('advantage', [
            'id' => $this->primaryKey(),
            'images' => $this->text(),
            'text' => $this->string(250),
            'text_ru' => $this->string(250),

        ]);
    }

    public function safeDown()
    {
        $this->dropTable('advantage');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181019_095717_add_table_advantage cannot be reverted.\n";

        return false;
    }
    */
}
