<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\UploadedFile;

use app\models\Genre;
use app\models\Book;
use app\models\BookSearch;
use app\models\Author;

class BookController extends \yii\web\Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                // 'only' => ['index', 'view'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['new', 'edit'],
                        'roles' => ['admin'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex()
    {

        $searchModel = new BookSearch();
        $dpBooks = $searchModel->search(Yii::$app->request->get());


        // $books = Book::find();
        // $dpBooks = new ActiveDataProvider([
        //     'query' => $books,
        //     'pagination' => [
        //         'pageSize' => 20,
        //     ],
        // ]);
        
        return $this->render('index', [
            // 'books' => $books->all(),
            'dpBooks' => $dpBooks,
            'smBooks' => $searchModel
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
        // if (!Yii::$app->user->can('createBook'))
        //     throw new \yii\web\ForbiddenHttpException('У вас нет доступа к этой странице');
        $book = new Book;
        if (!is_null(Yii::$app->request->post('Book'))) {
            $book->attributes = Yii::$app->request->post('Book');
            $author = Author::find()
                ->where(['id' => Yii::$app->request->post('Book')['author_id']])
                ->one();
            $genre = Genre::find()
                ->where(['id' => Yii::$app->request->post('Book')['genre_id']])
                ->one();
            $book->link('author', $author);
            if ($book->save()) {
                return $this->redirect(['book/view', 'id' => $book->id]);
            }
        }
        // return $this->render('new', [
        //     'authors' => $authors,
        //     'book'    => $book
        // ]);
        $authors = Author::find()->all();
        $genre = Genre::find()->all();
        return $this->render('new', [
            'genre'   => $genre,
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
            $genre = Genre::find()
                ->where(['id' => Yii::$app->request->post('Book')['genre_id']])
                ->one();
            $book->link('author', $author);
            if ($book->save()) {
                return $this->redirect(['book/view', 'id' => $book->id]);
            }
        }
        return $this->render('edit', [
            'book' => $book,
            'authors' => Author::find()->all(),
            'genre' => Genre::find()->all(),
        ]);
    }

    private function getBook($id)
    {
        return Book::find()
            ->where(['id' => $id])
            ->one();
    }
}