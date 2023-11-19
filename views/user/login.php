<?php

/** @var yii\web\View $this */
/** @var app\models\forms\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\url;

$this->registerCssFile('css/login.css');
$this->title = Yii::$app->name . ' | Вход';

?>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'method' => 'post',
                'options' => [
                    'class' => 'p-4  border border-dark border-1 rounded rounded-4',
                    'style' => 'background-color: #fbf7f7;'
                ],
                'fieldConfig' => [
//                    'options' => ['class' => 'field'],
//                    'inputOptions' => ['class' => 'input'],
//                    'labelOptions' => ['class' => 'label'],
//                    // 'errorOptions' => ['class' => 'test-4'],
//                    'template' => '{label}{input}{error}',
                ],
            ]); ?>

            <h1 class="fs-3 mt-0 text-center">Вход</h1>

            <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите вашу почту.']) ?>
            <?= $form->field($model, 'password')->input('password', ['placeholder' => 'Вспомните ваш надежный пароль.']) ?>

            <div class="d-grid gap-2 col mx-auto">
                <?= Html::submitButton('Добро пожаловать!', ['class' => 'btn btn-dark']) ?>
            </div>
            <a class="d-block text-center mt-3 text-decoration-none link-dark" href="<?= url::to(['user/signup']) ?>">Не зарегистрировались? - Вам сюда!</a>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<!--<div class="wrapper">-->
<!--        <p class="text">Вход</p>-->
<!---->
<!--        <div class="field">-->
<!--            <label class="label" for="login">Логин</label>-->
<!--            <input class="input" type="text" name="login" id="login" placeholder="Введите вашу почту.">-->
<!--        </div>-->
<!--        <div class="field">-->
<!--            <label class="label" for="password">Пароль</label>-->
<!--            <input class="input" type="text" name="password" id="password" placeholder="Введите ваш пароль.">-->
<!--        </div>-->
<!---->
<!--        <a class="registration" href="#" target="_self">Добро пожаловать!</a>-->
<!---->
<!--        <a class="already"href="#">Не зарегистрировались? - Вам сюда!</a>-->
<!--        -->
<!--</div>-->
