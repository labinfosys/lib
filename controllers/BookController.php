<?php

namespace app\controllers;

use app\models\Book;

class BookController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $books = Book::find()->all();
        return $this->render('index', [
            'books' => $books
        ]);
    }
    public function actionView($id)
    {
        $book = Book::find()
            ->where(['id' => $id])
            ->one();
        return $this->render('view', [
            'book' => $book,
        ]);
    }
    public function actionNew()
    {
        if (isset($_POST['Book'])) {
            $book = new Book;
            $book->attributes = $_POST['Book'];
            $book->save();
            return $this->redirect(['book/view', $book->id]);
        }
        return $this->render('new');
    }
}