<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m181228_004055_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'password_hash' => $this->string(),
            'role' => $this->string(),
            'auth_key' => $this->string(),
            'lastlogin_at' => $this->timestamp(),
            'confirmed_at' => $this->timestamp(),
            'blocked_at' => $this->timestamp(),
            'deleted_at' => $this->timestamp(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
