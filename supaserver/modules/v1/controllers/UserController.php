<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\User;
use yii\rest\Controller;

class UserController extends ApiController {
public function actionLogin($username, $password) {
        $user = User::findOne(['username' => $username, 'password' => $password]);

        if ($user == null) {
            return [
                'statusText' => "Unauthorised credentials."
            ];
        }
        return $user->username;
    }

    public function actionRegister($username, $password) {
        $user = User::findOne(['username' => $username]);

        if ($user != null){
            return [
                'statusText' => "Username already exists."
            ];
        }

        $newUser = new User();
        $newUser->username = $username;
        $newUser->password = $password;
        $newUser->save();

        return $newUser->username;
    }

    public function actionAll() {
        return User::find()->all();
    }
}