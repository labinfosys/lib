<?php
/* @var $this yii\web\View */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Book;
?>
<h1>Каталог книг</h1>

<?=
GridView::widget([
    'dataProvider' => $dpBooks,
    'filterModel'  => $smBooks,
    'columns' => [
        [
            'attribute' => 'book_name',
            'format' => 'html',
            'value' => function($book) {
                return Html::a($book->book_name, ['book/view', 'id' => $book->id]);
            },
        ],
        'genre.genre',
        'author.fullName',
        'description'
    ]
]);
?>
<?= Html::a('Добавить книгу', ['book/new'], ['class' => 'btn btn-primary']) ?>
