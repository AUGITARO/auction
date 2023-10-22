<?php

namespace app\controllers;

use app\models\forms\CreateLotForm;
use app\models\User;
use app\models\Category;
use app\services\LotService;
use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\web\Response;
use yii\web\UploadedFile;
use app\models\Lot;

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
            $create_lot_form->picture = UploadedFile::getInstance($create_lot_form, 'picture');

//            var_dump($create_lot_form->picture);
//            exit;

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
        $lot = Lot::findOne($lot_id);

        return $this->render("view", [
            'lot' => $lot
        ]);
    }

}
