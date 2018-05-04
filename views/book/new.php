<h1>Добавляй</h1>

<form method="post">
    <label>
        Название
        <input type="text" name="Book[book_name]">
    </label>
    <label>
        Описание
        <input type="text" name="Book[description]">
    </label>
    <input type="hidden" name="<?=Yii::$app->request->csrfParam?>"
           value="<?=Yii::$app->request->csrfToken?>">
    <input type="submit" value="Сохранить">
</form>