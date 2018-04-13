<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `book`.
 */
class m180413_172714_create_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'author_id' => Schema::TYPE_INTEGER,
            'book_name' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
        ]);

        $this->addForeignKey(
            'fk-book-author_id',
            'book',
            'author_id',
            'author',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-book-author_id');
        $this->dropTable('book');
    }
}
