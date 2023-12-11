<?php

namespace app\controllers;

use app\models\Rate;

class RateController extends BaseController
{
    public function actionIndex(): string
    {
        $rates = Rate::find()->where(['user_id' => $this->user->id])->all();

        return $this->render('index', [
            'rates' => $rates,
        ]);
    }
}