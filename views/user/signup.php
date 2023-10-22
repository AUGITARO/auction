<?php

/** @var yii\web\View $this */
/** @var app\models\forms\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\url;

$this->registerCssFile('css/signup.css');
$this->title = Yii::$app->name . ' | Регистрация';

?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'signup-form',
                'method' => 'post',
                'options' => [
                    'class' => 'p-4  border border-dark border-1 rounded rounded-4',
                    'style' => 'background-color: #fbf7f7;'
                ],
                'fieldConfig' => [
//                    'options' => ['class' => 'field'],
//                    'inputOptions' => ['class' => 'input'],
//                    'labelOptions' => ['class' => 'label'],
//                    'errorOptions' => ['class' => 'test-4'],
//                    'template' => '{label}{input}{error}',
                ],
            ]); ?>
                <h1 class="fs-3 mb-3 text-center">Регистрация</h1>

                <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите вашу почту.']) ?>
                <?= $form->field($model, 'password')->input('password', ['placeholder' => 'Придумайте надежный пароль.']) ?>
                <?= $form->field($model, 'password_repeat')->input('password', ['placeholder' => 'Повторите пароль.']) ?>
                <?= $form->field($model, 'username')->textInput(['placeholder' => 'Представьтесь']) ?>
                <?= $form->field($model, 'contacts')->textarea(['placeholder' => 'Как с вами связаться']) ?>
                <?= $form->field($model, 'avatar')->fileInput() ?>

                <div class="d-grid gap-2 col mx-auto">
                    <?= Html::submitButton('Стать аукционером!', ['class' => 'btn btn-dark mb-3']) ?>
                </div>
                <a class="d-block text-center mt-3 link-dark text-decoration-none" href="<?= Url::to(['user/login']) ?>">Уже зарегистрировались? - Войдите</a>

            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>
