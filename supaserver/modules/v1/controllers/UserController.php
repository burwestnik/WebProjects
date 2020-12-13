<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\User;
use Yii;

class UserController extends ApiController {
public function actionLogin() {
        $username = Yii::$app->request->getBodyParam('username');
        $password = Yii::$app->request->getBodyParam('password');

        $user = User::findOne(['username' => $username, 'password' => $password]);

        if ($user == null) {
            Yii::$app->response->statusCode = 401;
            return [
                'statusText' => "Unauthorised credentials."
            ];
        }
        return $user->username;
    }

    public function actionRegister() {
        $username = Yii::$app->request->getBodyParam('username');
        $password = Yii::$app->request->getBodyParam('password');

        $user = User::findOne(['username' => $username]);

        if ($user != null){
            Yii::$app->response->statusCode = 401;
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