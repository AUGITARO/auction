<?php

namespace app\controllers;

use app\models\Category;
use app\models\forms\CreateLotForm;
use app\models\forms\CreateRateForm;
use app\models\Lot;
use app\services\LotService;
use app\services\RateService;
use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class LotController extends BaseController
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['create', 'view'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                ]
            ]
        ];
    }

    public function actionCreate(): Response|string
    {
        $model = new CreateLotForm();
        $categories = Category::find()->all();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $this->user->id;
            $model->picture = UploadedFile::getInstance($model, 'picture');

            if ($model->validate()) {
                (new LotService())->create($model);
                return $this->redirect(['site/index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
            'categories' => $categories,
        ]);
    }

    public function actionView(int $lot_id): string
    {
        if (!$lot = Lot::findOne($lot_id)) {
            throw new NotFoundHttpException();
        }

        $model = new CreateRateForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->user_id = $this->user->id;
            $model->lot_id = $lot_id;

            if ($model->validate()) {
                (new RateService())->create($model);
            }
        }

        return $this->render("view", [
            'lot' => $lot,
            'model' => $model,
        ]);
    }
}
