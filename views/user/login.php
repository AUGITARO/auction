<?php

/** @var yii\web\View $this */
/** @var app\models\forms\LoginForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('css/login.css');
$this->title = Yii::$app->name . ' | Вход';

// TODO: Привести к сдному стилю кавычки;
// TODO: Подготовить модель для loginForm;
?>
<div class="wrapper">
    <p class="text">Вход</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'method' => 'post',
        'options' => [
            'class' => 'wrapper'
        ],
        'fieldConfig' => [
            'options' => ['class' => 'field'],
            'inputOptions' => ['class' => 'input'],
            'labelOptions' => ['class' => 'label'],
            // 'errorOptions' => ['class' => 'test-4'],
            'template' => '{label}{input}{error}',
        ],
    ]); ?>

    <?= $form->field($model, 'email')->input('email', ['placeholder' => 'Введите вашу почту.']) ?>
    <?= $form->field($model, 'password')->input('password', ['placeholder' => 'Вспомните ваш надежный пароль.']) ?>

    <?= Html::submitButton('Добро пожаловать!', ['class' => 'registration']) ?>
    <a class="already" href="#">Не зарегистрировались? - Вам сюда!</a>

    <?php ActiveForm::end(); ?>

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
