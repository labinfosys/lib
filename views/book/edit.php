<h1>Редактор книги <?= $book->book_name ?></h1>

<?php echo $this->render('_form', [
    'book' => $book, 
    'authors' => $authors,
    'genre' => $genre
]) ?>
