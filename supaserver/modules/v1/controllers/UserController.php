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

        while (true) {
                    $token = md5(microtime(true));

                    $userWithSameToken = User::findOne(['accessToken' => $token]);
                    if ($userWithSameToken != null){
                        continue;
                    } else {
                        $user->accessToken = $token;
                        $user->save();
                        break;
                    }
                }

        return $user;
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

        while (true){
                    $token = md5(microtime(true));

                    $userWithSameToken = User::findOne(['accessToken' => $token]);
                    if ($userWithSameToken != null){
                        continue;
                    } else {
                        $newUser->accessToken = $token;
                        break;
                    }
                }

        $newUser->save();

        return $newUser;
    }

    public function actionAll() {
        return User::find()->all();
    }
}