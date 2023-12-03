<?php

namespace app\controllers;

use app\models\Category;
use app\models\Lot;
use app\models\User;
use app\services\LotService;
use Yii;
use yii\helpers\Url;
use yii\web\Controller;

class SiteController extends Controller
{
    public $user;
    public $categories;
    public $category_id;

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

    public function actionIndex(?int $category_id = null): string
    {
        $this->categories = Category::find()->all();
        $this->category_id = $category_id;

        $lots = (new LotService())->getLotList($category_id);

        return $this->render('index', [
            'lots' => $lots,
        ]);
    }

    public function actionError(): string
    {
        $this->layout = 'error';
        $message = match ($status = Yii::$app->response->statusCode) {
            403 => 'Страница недоступна',
            404 => 'Страница не найдена',
            400 => 'Bad Request',
            default => 'example'
        };

        return $this->render('error', [
            'message' => $message,
            'status' => $status,
        ]);
    }
}
