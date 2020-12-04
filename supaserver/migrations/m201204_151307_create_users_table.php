<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m201204_151307_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string(32)->notNull()->comment('Username'),
            'password' => $this->string(32)->notNull()->comment('Password'),
            'createdAt' => $this->dateTime()->notNull()->comment('Creation time'),
            'updatedAt' => $this->dateTime()->comment('Update time')
        ]);
        $this->addColumn('{{%comments}}', 'user_id', $this->integer()->comment('User'));
        $this->addForeignKey('fk_comments_user_id', '{{%comments}}', 'user_id', '{{%users}}', 'id', 'SET NULL');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
