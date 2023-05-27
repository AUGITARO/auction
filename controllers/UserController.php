<?php 

namespace app\controllers;

use app\services\UserService;
use Yii;
use yii\web\Controller;
use app\models\forms\LoginForm;
use app\models\forms\SignupForm;
use yii\web\UploadedFile;

class UserController extends Controller
{
    public function actionLogin()
    {
        $this->layout = 'main';
        $login_form = new LoginForm();

        if (Yii::$app->request->isPost) {
            $login_form->load(Yii::$app->request->post());

            if ($login_form->validate()) {
                var_dump(1);
                exit;
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

            if ($signup_form->validate()) {
                if ((new UserService())->create($signup_form)) {
                    return $this->redirect(["site/index"]);
                }
            }
        }

        return $this->render('signup', [
            'model' => $signup_form,
        ]);
    }
}

