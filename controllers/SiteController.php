<?php

namespace app\controllers;

use yii\filters\AccessControl;
use yii\web\Controller;
use Yii;
use app\models\User;

class SiteController extends Controller
{
    public $user;

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?', '@']
                    ],
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $this->layout = 'main';

        if (!Yii::$app->user->isGuest) {
            $this->user = User::findOne(Yii::$app->user->id);
        }

        return $this->render('index');
    }

}
