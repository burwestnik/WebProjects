<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Comment;
use app\modules\v1\models\User;
use Yii;

class UserController extends ApiController {
    public function actionAll() {
        return Comment::find()->all();
    }

    public function actionEmoteid($emote_id) {
        return Comment::findAll(['emote_id' => $emote_id]);
    }

    public function actionUserid($user_id) {
        return Comment::findAll(['user_id' => $user_id]);
    }

    public function actionDelete($id) {
        $user = User::findOne(['accessToken' => $accessToken]);

        if ($user == null) {
            Yii::$app->response->statusCode = 401;
            return [
                'statusText' => "User not authorised."
            ];
        }

        $comment = Comment::findOne(['id' => $id]);

        if ($comment == null) {
            Yii::$app->response->statusCode = 401;
            return [
                'statusText' => "Comment does not exist."
            ];
        }

        if ($comment->userId != $user->id) {
                    Yii::$app->response->statusCode = 403;
                    return [
                        'statusText' => "You can not delete other bajs' comments FeelsWeirdMan."
                    ];
                }

        $comment->delete();

        return [
            'statusText' => 'Comment deleted successfully.'
        ];
    }

    public function actionCreate() {
        $user = User::findOne(['accessToken' => $accessToken]);

        if ($user == null) {
            Yii::$app->response->statusCode = 401;
            return [
                'statusText' => "User not authorised."
            ];
        }

        $comment = new Comment();
        $comment->load(Yii::$app->request->getBodyParams(), '');
        $comment->save();

        return $comment;
    }
}