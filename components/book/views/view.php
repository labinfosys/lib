<?php
?>
<div class="book">
    <div class="book__cover">
        <?php if ($book->cover > '') : ?>
            <img src="<?= Yii::getAlias('@web/uploads/' . $book->id . '/' . $book->cover) ?>" alt="<?= $book->book_name ?>">
        <?php else : ?>
            Нет изображения
        <?php endif; ?>
    </div>
    <div class="book__title"><?= $book->book_name ?></div>
    <div class="book__description">
        <?= $book->description ?>
    </div>
</div>