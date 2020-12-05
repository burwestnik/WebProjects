<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Comment;
use yii\rest\Controller;

class UserController extends ApiController {
    public function actionAll() {
        return Comment::find()->all();
    }

    public function actionNewsid($emote_id) {
        return Comment::findAll(['emote_id' => $emote_id]);
    }

    public function actionUserid($user_id) {
        return Comment::findAll(['user_id' => $user_id]);
    }

    public function actionDelete($id) {
        $comment = Comment::findOne(['id' => $id]);

        if ($comment == null) {
            return [
                'statusText' => "Comment does not exist."
            ];
        }

        $comment->delete();

        return [
            'statusText' => 'Comment deleted successfully.'
        ];
    }

    public function actionCreate() {
        $comment = new Comment();
        $comment->load(Yii::$app->request->getBodyParams(), '');
        $comment->save();

        return $comment;
    }
}