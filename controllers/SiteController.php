<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;
use app\models\Lot;

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

    public function actionIndex(): string
    {
        $this->layout = 'main';
        $lots = Lot::find()->all();

        if (isset(Yii::$app->user->id)) {
            $this->user = User::findOne(Yii::$app->user->id);
        }

        return $this->render('index', [
            'lots' => $lots,
        ]);
    }

}
