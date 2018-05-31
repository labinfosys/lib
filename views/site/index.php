<?php
use yii\helpers\VarDumper;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div>
        <?php VarDumper::dump(\Yii::$app->user->isGuest, 10, true) ?>
        <?php VarDumper::dump(\Yii::$app->getSecurity()->generatePasswordHash('12345'), 10, true) ?>
    </div>

</div>
