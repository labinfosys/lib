<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
$authors = ArrayHelper::map($authors, 'id', 'fullName');
?>

<?php $form = ActiveForm::begin([
        'id' => 'new-book-form',
    ]) ?>
    <?= $form->field($book, 'book_name') ?>
    <?= $form->field($book, 'author_id')->dropdownList(
        $authors, 
        ['prompt'=>'Выберите автора']
    ) ?>
    <?= $form->field($book, 'description')->textarea(['rows' => 3]) ?>
    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>
<?php ActiveForm::end() ?>