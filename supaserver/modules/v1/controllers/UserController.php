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
        return [
            [
                'id' => 1,
                'login' => "pepega",
                'password' => 'forsan',
            ],
            [
                'id' => 2,
                'login' => "okayge",
                'password' => 'cock',
            ],
            [
                'id' => 3,
                'login' => "bruceu",
                'password' => 'zulul'
            ],
        ];
    }
}