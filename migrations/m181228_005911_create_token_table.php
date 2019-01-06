<?php

use yii\db\Migration;

/**
 * Handles the creation of table `token`.
 */
class m181228_005911_create_token_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('token', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'type' => $this->string(),
            'data' => $this->string(),
            'created_at' => 'timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('token');
    }
}
