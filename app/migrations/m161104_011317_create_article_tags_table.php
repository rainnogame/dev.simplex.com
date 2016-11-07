<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_tags`.
 */
class m161104_011317_create_article_tags_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%article_tags}}', [
            'id'         => $this->primaryKey(),
            'article_id' => $this->integer()->notNull(),
            'tag_id'     => $this->integer()->notNull(),
        ], 'ENGINE=InnoDB CHARSET=utf8');
        
        $this->addForeignKey('article_tags_tag_fk', '{{%article_tags}}', 'tag_id', '{{%tag}}', 'id');
        $this->addForeignKey('article_tags_article_fk', '{{%article_tags}}', 'article_id', '{{%article}}', 'id');
    }
    
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%article_tags}}');
    }
}
