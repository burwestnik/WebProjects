<?php

namespace app\modules\v1\controllers;

use app\modules\v1\models\Emote;
use Yii;

class EmoteController extends ApiController {
    public function actionAll() {
        return Emote::find()->all();
    }

    public function actionConcrete($id) {
        return Emote::findOne(['id' => $id]);
    }

    public function actionCreate() {
        $emote = new Emote();
        $emote->load(Yii::$app->request->getBodyParams(), '');
        $emote->save();

        return $emote;
    }

    public function actionUpdate($id) {
    	$emote = Emote::findOne(['id' => $id]);

		if ($emote == null) {
            return [
                'statusText' => "Emote does not exist."
            ];
        }

    	$emote->load(Yii::$app->request->getBodyParams(), '');
        $emote->save();

        return $emote;
    }

    public function actionDelete() {
		$emote = Emote::findOne(['id' => $id]);

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