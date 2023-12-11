<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class BaseController extends Controller
{
    public $user;

    public function beforeAction($action): bool
    {
        if (!parent::beforeAction($action)) {
            return false;
        }

        $this->layout = 'main';
        $this->user = User::findOne(Yii::$app->user->id);
        Url::remember();

        return true;
    }
}