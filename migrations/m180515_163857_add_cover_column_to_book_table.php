<?php

use yii\db\Migration;

/**
 * Handles adding cover to table `book`.
 */
class m180515_163857_add_cover_column_to_book_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('book', 'cover', $this->string());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('book', 'cover');
    }
}
