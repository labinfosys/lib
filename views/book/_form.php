<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
$authors = ArrayHelper::map($authors, 'id', 'fullName');
$genre = ArrayHelper::map($genre, 'id', 'genre');
?>

<?php $form = ActiveForm::begin([
        'id' => 'new-book-form',
    ]) ?>
    <?= $form->field($book, 'book_name') ?>
    <?= $form->field($book, 'author_id')->dropdownList(
        $authors, 
        ['prompt'=>'Выберите автора']
    ) ?>
    <?= $form->field($book, 'genre_id')->dropdownList(
        $genre, 
        ['prompt'=>'Выберите жанр']
    )?>
    <?= $form->field($book, 'description')->textarea(['rows' => 3]) ?>
    <?= $form->field($book, 'coverFile')->fileInput() ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end() ?>