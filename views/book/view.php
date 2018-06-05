<?php
use yii\UrlHelper;
use app\assets\BookAsset;
use yii\helpers\Html;

BookAsset::register($this);
?>

<h1><?= $book->book_name ?></h1>

<div class="book_cover">
    <?php if ($book->cover > '') : ?>
        <img src="<?= Yii::getAlias('@web/uploads/' . $book->id . '/' . $book->cover) ?>" alt="<?= $book->book_name ?>">
    <?php else : ?>
        Нет изображения
    <?php endif; ?>
</div>
<div class="book_info">
    <h3 class="h">
        <p class="p_view">
            <strong>Авторы: </strong><?= $book->authorList ?>.
        </p>
        <?php if (!is_null($book->genre)) : ?>
        Жанр: <p class="p_view"><?= $book->genre->genre ?></p>
        <?php endif; ?>
    </h3>
</div>
<div class="clearfix"></div>
<div class="book_des">
    <h3 class="h">Описание:</h3>
    <p class="p_view"><?= $book->description ?></p>
</div>
<div>
    <?= Html::a('Редактировать', ['book/edit', 'id' => $book->id]); ?>
</div>