<?php

/** @var yii\web\View $this */
/** @var app\models\Lot[] $lots */

use yii\helpers\Html;

?>

<?php foreach ($lots as $lot): ?>

    <h3><?= Html::encode($lot->name) ?></h3>

<?php endforeach; ?>
