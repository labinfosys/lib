<?php 
use yii\jui\DatePicker;
use app\components\book\BookWidget;
?>
<h2>Тест виджетов</h2>

<div class="book-list">
    <?php foreach($books as $book) : ?>
        <?= BookWidget::widget(['book' => $book]) ?>
    <?php endforeach; ?>
</div>