<h1><?= $book->book_name ?></h1>
    <div class="book_cover">
    
    </div>
    <div class="book_info">
        <h3 class="h">
           Автор: <p class="p_view"><?= $book->author->fullName ?></p>
        </h3>
    </div>
    <div class="book_des">
        <h3 class="h">Описание:</h3>
        <p class="p_view"><?= $book->description ?></p>
    </div>
