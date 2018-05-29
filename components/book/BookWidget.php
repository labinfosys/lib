<?php
namespace app\components\book;

use yii\base\Widget;
use yii\helpers\Html;

class BookWidget extends Widget
{
    public $book;

    public function init()
    {
        BookWidgetAsset::register( $this->getView() );
        parent::init();
    }

    public function run()
    {
        return $this->render('view', [
            'book' => $this->book
        ]);
    }
}