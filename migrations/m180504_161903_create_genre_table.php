<?php

use yii\db\Migration;
use yii\db\Schema;

/**
 * Handles the creation of table `genre`.
 */
class m180504_161903_create_genre_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('genre', [
            'id' => $this->primaryKey(),
            'genre' => Schema::TYPE_STRING,
        ]);

        $this->addColumn('book', 'genre_id', Schema::TYPE_INTEGER);

        $this->addForeignKey(
            'fk-book-genre_id',
            'book',
            'genre_id',
            'genre',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-book-genre_id','book');
        $this->dropColumn('book', 'genre_id');
        $this->dropTable('genre');
    }
}
