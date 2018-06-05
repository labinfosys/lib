<?php

use yii\db\Migration;

/**
 * Class m180605_162823_create_table_book_autor
 */
class m180605_162823_create_table_book_autor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('book_author', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'book_id'   => $this->integer(),
        ]);
        $this->dropForeignKey('fk-book-author_id', 'book');
        $this->addForeignKey(
            'fk-book-author-book_id',
            'book_author',
            'book_id',
            'book',
            'id'
        );
        $this->addForeignKey(
            'fk-book-author-author_id',
            'book_author',
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
        $this->dropForeignKey('fk-book-author-book_id', 'book_author');
        $this->dropForeignKey('fk-book-author-author_id', 'book_author');
        $this->dropTable('book_author');
        $this->addForeignKey(
            'fk-book-author_id',
            'book',
            'author_id',
            'author',
            'id'
        );
        return true;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180605_162823_create_table_book_autor cannot be reverted.\n";

        return false;
    }
    */
}
