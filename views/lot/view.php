<?php

/** @var yii\web\View $this */
/** @var app\models\Lot $lot */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = Yii::$app->name . ' | ' . $lot->name;
$this->registerCssFile('css/view.css');

?>
<div class="container">
    <div class="row mt-5">
        <div class="col">
            <h1><?= Html::encode($lot->name) ?></h1>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-8">
            <div class="p-4 bg-dark rounded-3">
                <img
                    class="lot-image"
                    src="/uploads/<?= Html::encode($lot->picture_path) ?>"
                    alt=""
                    style="width: 100%; object-fit: contain; object-position: center;"
                >
                <dl class="mt-4">
                    <dt class="text-light">Категория:</dt>
                    <dd class="text-light"><?= Html::encode($lot->category->name) ?></dd>

                    <dt class="text-light">Об предмете:</dt>
                    <dd class="text-light"><?= Html::encode($lot->description) ?></dd>
                </dl>
            </div>
        </div>

        <div class="col-4">
            <div class="row">
                <div class="col">
                    <div class="p-4 bg-dark rounded-3">
                        <div class="timer">
                            <img class="timer-icon" src="/img/timer.png" alt="timer">
                            <p class="text-light">2023-12-12</p>
                        </div>
                        <div>
                            <p class="m-0 mt-3 text-light">Текущая цена</p>
                            <p class="fs-3 fw-bold text-light">10000000 &#8381;</p>
                        </div>
                        <div>
                            <p class="m-0 mt-3 text-light">Мин. ставка</p>
                            <p class="fs-3 fw-bold text-light">100000</p>
                        </div>
                        <form
                            class="d-flex justify-content-between needs-validation"
                            action="#"
                            method="post"
                            enctype="application/x-www-form-urlencoded"
                            autocomplete="off"
                        >
                            <div>
                                <label for="validationCustom03" class="form-label text-light">Ставите?</label>
                                <input type="text" class="form-control" id="validationCustom03" required>
                                <div class="invalid-feedback text-light">Пожалуйста, введите ставку</div>
                            </div>
                            <input class="align-self-end ms-auto btn btn-success" type="submit" value="Поставить!">
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col">
                    <div class="p-4 bg-dark rounded-3">
                        <p class="text-light p-0 fs-3">История ставок (4)</p>
                        <table class="table table-sm table-dark table-striped mt-2">
                            <tbody>
                                <tr>
                                    <td>Челик1</td>
                                    <td>10000</td>
                                    <td>2ч. назад</td>
                                </tr>
                                <tr>
                                    <td>Челик2</td>
                                    <td>1000</td>
                                    <td>3ч. назад</td>
                                </tr>
                                <tr>
                                    <td>Челик3</td>
                                    <td>1000</td>
                                    <td>3ч. назад</td>
                                </tr>
                                <tr>
                                    <td>Челик4</td>
                                    <td>1000</td>
                                    <td>3ч. назад</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
