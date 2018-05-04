<h1><?= $book->book_name ?></h1>
<h3 class="h">
    Автор: <p class="p_view"><?= $book->author->fullName ?></p>
</h3>
<h3 class="h">Описание:</h3>
<p class="p_view"><?= $book->description ?></p>
