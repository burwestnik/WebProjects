<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\User;
use yii\rest\Controller;

class UserController extends ApiController {
    public function actionLogin() {
        // login stuff
    }

    public function actionRegister() {
        // register stuff
    }

    public function actionAll() {
        $user = new User();
        return $user -> getUsers();
    }
}