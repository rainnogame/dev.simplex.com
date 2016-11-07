<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article`.
 */
class m161104_011249_create_article_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        
        $this->createTable('{{%article}}', [
            'id'          => $this->primaryKey(),
            'category_id' => $this->integer()->notNull(),
            'title'       => $this->string(40),
            'description' => $this->string(255),
            'content'     => $this->text(),
            'type_id'     => $this->integer(),
        ], 'ENGINE=InnoDB CHARSET=utf8');
        $this->addForeignKey('article_category_fk', '{{%article}}', 'category_id', '{{%category}}', 'id', 'cascade');
        $this->addForeignKey('article_type_fk', '{{%article}}', 'type_id', '{{%article_type}}', 'id');
    }
    
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('article');
    }
}
