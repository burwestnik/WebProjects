<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%emotes}}`.
 */
class m201204_151413_create_emotes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%emotes}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(32)->notNull()->comment('Name'),
            'description' => $this->text()->notNull()->comment('Description'),
            'image' => $this->string()->notNull()->comment('Image'),
            'createdAt' => $this->dateTime()->notNull()->comment('Creation time'),
            'updatedAt' => $this->dateTime()->comment('Update time')
        ]);
        $this->addColumn('{{%comments}}', 'emote_id', $this->integer()->comment('Emote'));
        $this->addForeignKey('fk_comments_emote_id', '{{%comments}}', 'emote_id', '{{%emotes}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_comments_emote_id', '{{%comments}}');
        $this->dropColumn('{{%comments}}', 'emote_id');
        $this->dropTable('{{%emotes}}');
    }
}
