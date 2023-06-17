<?php 

namespace app\controllers;

use app\services\UserService;
use Yii;
use yii\web\Controller;
use app\models\forms\LoginForm;
use app\models\forms\SignupForm;
use yii\web\UploadedFile;
use app\models\User;
use yii\filters\AccessControl;

class UserController extends Controller
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

    public function actionLogin()
    {
        $this->layout = 'main';
        $login_form = new LoginForm();

        if (Yii::$app->request->isPost) {
            $login_form->load(Yii::$app->request->post());

            if ($login_form->validate()) {
                Yii::$app->user->login(User::findOne(['email' => $login_form->email]));
                return $this->redirect(['site/index']);
            }
        }

        return $this->render('login', [
            'model' => $login_form,
        ]);
    }

    public function actionSignup()
    {
        $this->layout = 'main';
        $signup_form = new SignupForm();

        if (Yii::$app->request->isPost) {
            $signup_form->load(Yii::$app->request->post());
            $signup_form->avatar = UploadedFile::getInstance($signup_form, 'avatar');

            if (
                $signup_form->validate()
                && (new UserService())->create($signup_form)
            ) {
                return $this->redirect(['site/index']);
            }
        }

        return $this->render('signup', [
            'model' => $signup_form,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(['site/index']);
    }

}



