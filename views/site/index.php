<?php

/** @var yii\web\View $this */
/** @var app\models\Lot[] $lots */

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile('css/index.css');
$this->title = Yii::$app->name . ' | Главная';

?>
<section class="py-5">
    <div class="container">
        <div class="row row-cols-1 row-cols-4 g-4 mt-3">

            <?php foreach ($lots as $lot): ?>
                <div class="col mt-0">
                    <div class="card p-3">
                        <img src="./uploads/<?= Html::encode($lot->picture_path) ?>" height="150" class="card-img-top" alt="..." style="object-fit: contain; object-position: center;">
                        <div class="card-body">
                            <a href="<?= Url::to(['lot/view', 'lot_id' => $lot->id]) ?>">
                                <h5 class="card-title"><?= Html::encode($lot->name) ?></h5>
                            </a>
                            <p class="card-text">Категория: <?= Html::encode($lot->category->name) ?></p>
                            <p class="card-text">Автор: <?= Html::encode($lot->user->username) ?></p>
                            <strong>Цена: <?= number_format($lot->start_price, 2, ',') ?>&#8381;</strong>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
