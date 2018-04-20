<?php

namespace app\controllers;

use app\models\Book;
class BookController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $books = Book::find()->all();
        return $this->render('index',[
            'books' => $books
        ]);
    }
    public function actionView()
    {
        return $this->render('view');
    }

}
