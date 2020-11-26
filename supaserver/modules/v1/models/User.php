<?php

namespace app\modules\v1\models;
use yii\base\Model;

class User extends Model {

    public function login() {
        // do login
    }

    public function register() {
        // do register
    }

    public function getUsers() {
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