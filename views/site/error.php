<?php

/** @var yii\web\View $this */
/** @var string $message */
/** @var int $status */

use yii\helpers\Html;
use yii\helpers\Url;

?>

<a href="<?= Url::to(['site/index']) ?>" class="return">Вернуться на главную</a>
<div class="numberError">
    <h1 class="error" data-text="<?= Html::encode($status) ?>"><?= Html::encode($status) ?></h1>
</div>
<h2 class="notFound"><?= Html::encode($message) ?></h2>
