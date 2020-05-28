<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%version}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%page}}`
 * - `{{%user}}`
 */
class m200528_021509_create_version_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%version}}', [
            'id' => $this->primaryKey(),
            'changed_at' => $this->datetime()->notNull(),
            'page_id' => $this->integer()->notNull(),
            'user_id' => $this->integer()->notNull(),
            'changed_body' => $this->text(),
        ]);

        // creates index for column `page_id`
        $this->createIndex(
            '{{%idx-version-page_id}}',
            '{{%version}}',
            'page_id'
        );

        // add foreign key for table `{{%page}}`
        $this->addForeignKey(
            '{{%fk-version-page_id}}',
            '{{%version}}',
            'page_id',
            '{{%page}}',
            'id',
            'CASCADE'
        );

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-version-user_id}}',
            '{{%version}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-version-user_id}}',
            '{{%version}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%page}}`
        $this->dropForeignKey(
            '{{%fk-version-page_id}}',
            '{{%version}}'
        );

        // drops index for column `page_id`
        $this->dropIndex(
            '{{%idx-version-page_id}}',
            '{{%version}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-version-user_id}}',
            '{{%version}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-version-user_id}}',
            '{{%version}}'
        );

        $this->dropTable('{{%version}}');
    }
}
