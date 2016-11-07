<?php

use yii\db\Migration;

/**
 * Handles the creation of table `tag`.
 */
class m161104_011303_create_tag_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%tag}}', [
            'id'    => $this->primaryKey(),
            'title' => $this->integer()->notNull(),
        ],  'ENGINE=InnoDB CHARSET=utf8');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%tag}}');
    }
}
