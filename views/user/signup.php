<?php

/** @var yii\web\View $this */
/** @var app\models\forms\SignupForm $model */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->registerCssFile('css/signup.css');
$this->title = Yii::$app->name . ' | Регистрация';


?>
<div class="wrapper">
    <p class="text">Регистрация</p>

    <?php $form = ActiveForm::begin([
        'id' => 'signup-form',
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
        <?= $form->field($model, 'password')->input('password', ['placeholder' => 'Придумайте надежный пароль.']) ?>
        <?= $form->field($model, 'password_repeat')->input('password', ['placeholder' => 'Повторите пароль.']) ?>
        <?= $form->field($model, 'username')->textInput(['placeholder' => 'Представьтесь !%?#*@]']) ?>
        <?= $form->field($model, 'contacts')->textarea(['placeholder' => 'Как с вами связаться !%?#*@]?']) ?>
        <?= $form->field($model, 'avatar')->fileInput() ?>

        <?= Html::submitButton('Стать аукционером!', ['class' => 'registration']) ?>
        <a class="already" href="#">Уже зарегистрировались? - Войдите</a>

    <?php ActiveForm::end(); ?>

</div>
