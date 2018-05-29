<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class HelloWidget extends Widget
{
    public $message;

    public function init()
    {
        parent::init();
        if (is_null($this->message)) {
            $this->message = 'Hello World';
        }
    }

    public function run()
    {
        return $this->render('hello', [
            'message' => $this->message
        ]);
    }
}