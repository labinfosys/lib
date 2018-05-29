<?php
namespace app\components\book;

use yii\web\AssetBundle;

class BookWidgetAsset extends AssetBundle {
    public $sourcePath = '@app/components/book';
    public $css = ['css/book-widget.css'];
    public $js = [];
    public $depends = [];
}