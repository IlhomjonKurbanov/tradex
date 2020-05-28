<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%page}}`.
 */
class m200528_021501_create_page_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%page}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(128)->notNull()->unique(),
            'description' => $this->string(512),
            'preview' => $this->string(2048),
            'body' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%page}}');
    }
}
