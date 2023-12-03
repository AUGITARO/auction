<?php

/** @var yii\web\View $this */
/** @var app\models\Category[] $categories */
/** @var app\models\forms\CreateLotForm $model */

use yii\bootstrap5\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile('css/create-lot.css');
$this->title = Yii::$app->name . ' | Создать лот';

?>
<section class="py-5">
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col col-lg-5">

                <?php $form = ActiveForm::begin([
                    'id' => 'lot-form',
                    'method' => 'post',
                    'options' => [
                        'class' => 'p-4  border border-dark border-1 rounded rounded-4',
                        'style' => 'background-color: #fbf7f7;'
                    ],
                    'fieldConfig' => [
            //            'options' => ['class' => 'field'],
            //            'inputOptions' => ['class' => 'input'],
            //            'labelOptions' => ['class' => 'label'],
            //            // 'errorOptions' => ['class' => 'test-4'],
            //            'template' => '{label}{input}{error}',
                    ],
                ]); ?>

                <h1 class="fs-3 mb-3 text-center">Создайте лот</h1>

                <?= $form->field($model, 'name')->input('text', ['placeholder' => 'Название лота']) ?>
                <?= $form->field($model, 'description')->textarea(['placeholder' => 'Почему ваш лот особенный?']) ?>
                <?= $form->field($model, 'start_price')->input('number', ['placeholder' => 'Со скольки начнем?']) ?>
                <?= $form->field($model, 'completion_date')->input('date', ['placeholder' => 'Когда закончим?']) ?>
                <?= $form->field($model, 'rate_step')->input('number', ['placeholder' => 'На сколько можно повышать?']) ?>
                <?= $form->field($model, 'category_id')->dropDownList(ArrayHelper::map($categories, 'id', 'name')) ?>
                <?= $form->field($model, 'picture')->fileInput() ?>

                <div class="d-grid gap-2 col mx-auto">
                    <?= Html::submitButton('Создать!', ['class' => 'btn btn-dark']) ?>
                </div>

                <a class="d-block text-center mt-3 text-decoration-none link-dark" href="<?= url::to(['user/signup']) ?>">Не хочешь создавать? Вернись на главную</a>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</section>