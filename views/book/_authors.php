<?php
    use yii\helpers\ArrayHelper;
    $authorList = ArrayHelper::map($authors, 'id', 'fullName');
    $authorList = implode(', ', $authorList);
?>
<p class="p_view">
    <strong>Авторы: </strong><?= $authorList ?>.
</p>