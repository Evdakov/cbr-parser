<?php

use yii\db\Migration;

/**
 * Class m200708_181354_insert_user
 */
class m200708_181354_insert_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%user}}', [
            'id' => 1,
            'username' => 'user',
            'verification_token' => '123321',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200708_181354_insert_user cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200708_181354_insert_user cannot be reverted.\n";

        return false;
    }
    */
}
