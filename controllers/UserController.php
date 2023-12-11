<?php 

namespace app\controllers;

use app\models\User;
use app\models\forms\LoginForm;
use app\models\forms\SignupForm;
use app\services\UserService;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Url;
use yii\web\Response;
use yii\web\UploadedFile;

class UserController extends BaseController
{
    public function behaviors(): array
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@']
                    ],
                    [
                        'actions' => ['login', 'signup'],
                        'allow' => true,
                        'roles' => ['?']
                    ],
                ]
            ]
        ];
    }

    public function actionLogin(): Response|string
    {
        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->validate()) {
                Yii::$app->user->login(User::findOne(['email' => $model->email]));
                return $this->redirect(Url::previous() ?? ['site/index']);
            }
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup(): Response|string
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            $model->avatar = UploadedFile::getInstance($model, 'avatar');

            if ($model->validate()) {
                (new UserService())->create($model);
                return $this->redirect(['site/index']);
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionLogout(): Response
    {
        Yii::$app->user->logout();
        return $this->redirect(['site/index']);
    }
}



