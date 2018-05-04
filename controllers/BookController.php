<?php

namespace app\controllers;

use app\models\Book;
use app\models\Author;
use yii\data\ActiveDataProvider;
use Yii;

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
        
        return $this->render('index', [
            'books' => $books->all(),
            'dpBooks' => $dpBooks
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
        if (!is_null(Yii::$app->request->post('Book'))) {
            $book = new Book;
            $book->attributes = Yii::$app->request->post('Book');
            $author = Author::find()
                ->where(['id' => Yii::$app->request->post('Book')['author_id']])
                ->one();
            $book->link('author', $author);
            if ($book->save()) {
                return $this->redirect(['book/view', 'id' => $book->id]);
            }
        }
        $authors = Author::find()->all();
        return $this->render('new', [
            'authors' => $authors
        ]);
    }
}