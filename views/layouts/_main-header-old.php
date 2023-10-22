<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$user = $this->context->user ?? null;

?>
<header>
    <nav>
        <a class="logo"><?= Html::encode(Yii::$app->name) ?></a>
        <ul>

            <?php if (Yii::$app->user->isGuest): ?>
                <li><a href="<?= Url::to(['user/login'])?>">Вход</a></li>
                <li><a href="<?= Url::to(['user/signup'])?>">Регистрация</a></li>
            <?php else: ?>
                <li><a href="<?= Url::to(['user/logout'])?>">Выход</a></li>
                <li><a href="#"><?= Html::encode($user->username ?? '') ?></a></li>
            <?php endif; ?>

        </ul>
    </nav>
</header>
