<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        $createBook = $auth->createPermission('createBook');
        $createBook->description = 'Создание книги';
        $auth->add($createBook);

        // добавляем разрешение "updatePost"
        $updateBook = $auth->createPermission('updateBook');
        $updateBook->description = 'Редактирование книги';
        $auth->add($updateBook);

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createBook);
        $auth->addChild($admin, $updateBook);

        $auth->assign($admin, 1);
    }
}