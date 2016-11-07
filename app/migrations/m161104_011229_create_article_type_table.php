<?php

use yii\db\Migration;

/**
 * Handles the creation of table `article_type`.
 */
class m161104_011229_create_article_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%article_type}}', [
            'id'    => $this->primaryKey(),
            'title' => $this->string(20)->notNull(),
        ],  'ENGINE=InnoDB CHARSET=utf8');
        $this->insert('{{%article_type}}', [
            'title' => 'Пример кода',
        ]);
        $this->insert('{{%article_type}}', [
            'title' => 'Полезная информация',
        ]);
        $this->insert('{{%article_type}}', [
            'title' => 'Список ссылок',
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%article_type}}');
    }
}
