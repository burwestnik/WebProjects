<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m201204_150646_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'comment' => $this->text()->notNull()->comment('Comment text'),
            'createdAt' => $this->dateTime()->notNull()->comment('Creation time'),
            'updatedAt' => $this->dateTime()->notNull()->comment('Update time')
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_comments_user_id', '{{%comments}}');
        $this->dropColumn('{{%comments}}', 'user_id');
        $this->dropTable('{{%comments}}');
    }
}
