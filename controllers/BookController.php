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
        return $this->render('view', [
            'book' => $this->getBook($id)
        ]);
    }
    
    public function actionNew()
    {
        $book = new Book;
        if (!is_null(Yii::$app->request->post('Book'))) {
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
            'authors' => $authors,
            'book'    => $book
        ]);
    }

    public function actionEdit($id) 
    {
        $book = $this->getBook($id);
        if (!is_null(Yii::$app->request->post('Book'))) {
            $book->attributes = Yii::$app->request->post('Book');
            $author = Author::find()
                ->where(['id' => Yii::$app->request->post('Book')['author_id']])
                ->one();
            $book->link('author', $author);
            if ($book->save()) {
                return $this->redirect(['book/view', 'id' => $book->id]);
            }
        }
        return $this->render('edit', [
            'book' => $book,
            'authors' => Author::find()->all()
        ]);
    }

    private function getBook($id)
    {
        return Book::find()
            ->where(['id' => $id])
            ->one();
    }
}