<?php

/** @var yii\web\View $this */
/** @var app\models\forms\SignupForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\url;

$this->registerCssFile('css/signup.css');
$this->title = Yii::$app->name . ' | Регистрация';

?>
<style>
    .form-check-input:checked {
        background-color: lime;
        border-color: lime;
    }
</style>
<div class="container">
    <div class="row d-flex justify-content-center">
        <div class="col col-lg-5">

            <?php $form = ActiveForm::begin([
                'id' => 'signup-form',
                'method' => 'post',
                'action' => Url::to(['user/signup']),
                'enableAjaxValidation' => false,
                'options' => [
                    'class' => 'p-4  border border-dark border-1 rounded rounded-4',
                    'enctype' => 'application/x-www-form-urlencoded',
                    'novalidate' => true,
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

                <div class="form-check form-switch">
                    <input id="password-btn" class="form-check-input" type="checkbox" role="switch">
                    <label class="form-check-label" for="password-btn">Показать пароль</label>
                </div>

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

<script>
    const inputElements = document.querySelectorAll('input[type=password]');
    const btnElement = document.querySelector('.form-check-input');
    for (const inputElement of inputElements) {
        btnElement.addEventListener("change", () => {
            if (inputElement.type === 'password') {
                inputElement.type = 'text';
            } else {
                inputElement.type = 'password';
            }
        });
    }
</script>