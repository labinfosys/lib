<h1>Новая книга</h1>

<?php echo $this->render('_form', [
    'book' => $book, 
    'authors' => $authors,
    'genre' => $genre
]) ?>