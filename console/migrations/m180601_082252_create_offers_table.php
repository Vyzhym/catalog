<?php

use yii\db\Migration;

/**
 * Handles the creation of table `offers`.
 */
class m180601_082252_create_offers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('offers', [
            'id' => $this->primaryKey(),
            'title' => $this->string(100),
            'title_ru' => $this->string(100),
            'description' => $this->text(),
            'description_ru' => $this->text(),
            'link' => $this->string(100),
            'offers_shop' => $this->string(100),

        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('offers');
    }
}
