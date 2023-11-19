<?php

namespace app\controllers;

use app\models\forms\CreateLotForm;
use app\models\User;
use app\models\Category;
use app\models\Lot;
use app\models\forms\CreateRateForm;
use app\services\LotService;
use app\services\RateService;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\UploadedFile;

class LotController extends Controller
{
    public $user;

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
        $this->layout = 'main';
        $this->user = User::findOne(Yii::$app->user->id);
        $create_lot_form = new CreateLotForm();
        $categories = Category::find()->all();

        if (Yii::$app->request->isPost) {
            $create_lot_form->load(Yii::$app->request->post());
            $create_lot_form->user_id = $this->user->id;
            $create_lot_form->picture = UploadedFile::getInstance($create_lot_form, 'picture');

            if (
                $create_lot_form->validate()
                && (new LotService())->create($create_lot_form)
            ) {
                return $this->redirect(['site/index']);
            }
        }

        return $this->render('create', [
            'model' => $create_lot_form,
            'categories' => $categories,
        ]);
    }

    public function actionView(int $lot_id): string
    {
        $this->layout = 'main';
        $this->user = User::findOne(Yii::$app->user->id);

        if (!$lot = Lot::findOne($lot_id)) {
            throw new NotFoundHttpException();
        }

        $model = new CreateRateForm();

        if (Yii::$app->request->isPost) {
            $model->load(Yii::$app->request->post());
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
