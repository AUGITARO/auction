<?php

namespace app\controllers;

use app\models\Category;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use app\models\User;
use app\models\Lot;

class SiteController extends Controller
{
    public $user;
    public $categories;
    public $category_id;

    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['index', 'error'],
                        'allow' => true,
                        'roles' => ['?', '@']
                    ],
                ]
            ]
        ];
    }

    public function actionIndex(?int $category_id = null): string
    {
        $this->layout = 'main';

        $query = Lot::find();
        if (isset($category_id)) {
            $query->where(['category_id' => $category_id]);
        }
        $lots = $query->all();

        $this->categories = Category::find()->all();
        $this->category_id = $category_id;

        if (isset(Yii::$app->user->id)) {
            $this->user = User::findOne(Yii::$app->user->id);
        }

        return $this->render('index', [
            'lots' => $lots,
        ]);
    }

    public function actionError(): string
    {
        return 'error';
    }

}
