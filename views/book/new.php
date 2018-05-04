<?php
use yii\helpers\Html;

?>
<h1>Новая книга</h1>

<form method="post">
    <label>
        Название
        <input type="text" name="Book[book_name]">
    </label><br>
    <label>
        Автор
        <select name="Book[author_id]">
            <?php foreach($authors as $author) : ?>
                <option value="<?= $author->id ?>"><?= $author->fullName ?></option>
            <?php endforeach; ?>
        </select>
    </label><br>
    <label>
        Описание
        <input type="text" name="Book[description]">
    </label><br>

    <input type="hidden" name="<?=Yii::$app->request->csrfParam?>"
           value="<?=Yii::$app->request->csrfToken?>">
    <input type="submit" value="Сохранить">
</form>