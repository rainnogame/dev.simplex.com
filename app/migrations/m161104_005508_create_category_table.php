<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m161104_005508_create_category_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%category}}', [
            'id'        => $this->primaryKey(),
            'title'     => $this->string(20)->notNull(),
            'parent_id' => $this->integer(),
        ],  'ENGINE=InnoDB CHARSET=utf8');
    }
    
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%category}}');
        $this->dropTable('{{%article_type}}');
        $this->dropTable('{{%article}}');
    }
}
