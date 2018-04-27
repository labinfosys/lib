<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
?>
<h1>Каталог книг</h1>

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
