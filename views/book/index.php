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
    'columns' => [
        [
            'attribute' => 'book_name',
            'format' => 'html',
            'value' => function($book) {
                return Html::a($book->book_name, ['book/view', 'id' => $book->id]);
            },
        ],
        'author.fullName',
        'description'
    ]
        // // Более сложный пример.
        // [
        //     'class' => 'yii\grid\DataColumn', // может быть опущено, поскольку является значением по умолчанию
        //     'value' => function ($data) {
        //         return $data->name; // $data['name'] для массивов, например, при использовании SqlDataProvider.
        //     },
        // ],
]);
?>

<ul>
<?php foreach($books as $book) : ?>
    <li>
        <?= Html::a($book->book_name, ['book/view', 'id' => $book->id]) ?>
        <?php if (!is_null($book->author)) : ?>
            <?= $book->author->name . ' ' . $book->author->surname ?>
        <?php endif; ?>
    </li>
<?php endforeach; ?>
</ul>

<?= Html::a('Добавить книгу', ['book/new'], ['class' => 'btn btn-primary']) ?>
