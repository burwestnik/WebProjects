<?php

use yii\db\Migration;

/**
 * Class m201214_131406_add_access_token_to_user_table
 */
class m201214_131406_add_access_token_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%users}}', 'accessToken', $this->string(512)->comment('Токен доступа'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%users}}', 'accessToken');

        return false;
    }
}
