<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Emote;
use app\modules\v1\models\User;
use Yii;

class EmoteController extends ApiController {
    public function actionAll() {
        return Emote::find()->all();
    }

    public function actionConcrete($id) {
        return Emote::findOne(['id' => $id]);
    }

    public function actionCreate($accessToken) {
        $user = User::findOne(['accessToken' => $accessToken]);

        if ($user == null) {
            Yii::$app->response->statusCode = 401;
            return [
                'statusText' => "User not authorised."
            ];
        }

        $emote = new Emote();
        $emote->load(Yii::$app->request->getBodyParams(), '');
        $emote->save();

        return $emote;
    }

    public function actionUpdate($emoteID, $accessToken) {
        $user = User::findOne(['accessToken' => $accessToken]);

        if ($user == null) {
            Yii::$app->response->statusCode = 401;
            return [
                'statusText' => "User not authorised."
            ];
        }

    	$emote = Emote::findOne(['id' => $emoteID]);

		if ($emote == null) {
            return [
                'statusText' => "Emote does not exist."
            ];
        }

    	$emote->load(Yii::$app->request->getBodyParams(), '');
        $emote->save();

        return $emote;
    }

    public function actionDelete($emoteID, $accessToken) {
        $user = User::findOne(['accessToken' => $accessToken]);

        if ($user == null) {
            Yii::$app->response->statusCode = 401;
            return [
                'statusText' => "User not authorised."
            ];
        }

		$emote = Emote::findOne(['id' => $emoteID]);

        if ($emote == null) {
            return [
                'statusText' => "Emote does not exist."
            ];
        }

        $emote->delete();

        return [
            'statusText' => 'Emote deleted successfully.'
        ];
    }
}