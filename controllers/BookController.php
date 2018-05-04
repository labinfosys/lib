<?php

namespace app\controllers;

use app\models\Book;
use app\models\Author;
use yii\data\ActiveDataProvider;

class BookController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $books = Book::find();
        $dpBooks = new ActiveDataProvider([
            'query' => $books,
            'pagination' => [
                'pageSize' => 20,
            ],
        ]);
        return $this->render('index',[
            'books' => $books->all(),
            'dpBooks' => $dpBooks
            ]);
        }
        
    public function actionView($id)
    {
        $book = Book::find()
            ->where(['id'=>$id])
            ->one();
        return $this->render('view',[
            'book'=>$book
        ]);
    }
    public function actionNew()
    {
        if (isset($_POST['book'])) {
            $book = new Book;
            $book->atributes;
            var_dump($_POST);
        }
        $authors = Author::find()->all();
        return $this->render('new', [
        'authors' => $authors
        ]);
           
    }

}
