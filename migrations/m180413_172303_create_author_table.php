<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `author`.
 */
class m180413_172303_create_author_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('author', [
            'id' => $this->primaryKey(),
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'surname' => Schema::TYPE_STRING . ' NOT NULL',
            'patronymic' => Schema::TYPE_STRING,
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('author');
    }
}
