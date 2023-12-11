<?php

/** @var yii\web\View $this */
/** @var app\models\Category[] $this->context->categories */
/** @var app\models\User $this->context->user */
/** @var int $this->context->category_id */

use yii\helpers\Html;
use yii\helpers\Url;

$user = $this->context->user ?? null;
$categories = $this->context->categories ?? null;
$category_id = $this->context->category_id ?? null;

?>
<header class="bg-dark fixed-top py-2" style="box-shadow: 0 0 5px rgba(0, 0, 0, 0.5);">
    <div class="container">
        <div class="row">
            <div class="col">
                <nav class="navbar navbar-expand-lg" data-bs-theme="dark">
                    <div class="container">
                        <a class="navbar-brand" href=" <?= Url::to(['site/index']) ?>"><?= Html::encode(Yii::$app->name) ?></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">

                            <?php if (parse_url(Url::canonical())['path'] === '/'): ?>
                                <div class="btn-group" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    <a
                                            href="<?= Url::to(['site/index']) ?>"
                                            class="btn btn-outline-warning<?= !isset($category_id) ? ' active' : '' ?>"
                                            aria-current="page"
                                    >Все</a>

                                    <?php foreach ($categories as $category): ?>
                                        <a
                                            href="<?= Url::to(['site/index', 'category_id' => $category->id]) ?>"
                                            class="btn btn-outline-warning<?= $category->id === $category_id ? ' active' : '' ?>"
                                            aria-current="page"
                                        ><?= Html::encode($category->name)?></a>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>

                            <ul class="navbar-nav <?= parse_url(Url::canonical())['path'] !== '/' ? ' ms-auto' : '' ?>">

                                <?php if (Yii::$app->user->isGuest): ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= Url::to(['user/login'])?>">Вход</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="<?= Url::to(['user/signup'])?>">Регистрация</a>
                                    </li>
                                <?php else: ?>
                                    <li class="nav-item dropdown" data-bs-theme="light" >
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= Html::encode($user->username) ?>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="<?= Url::to(['lot/create'])?>">Создать ЛОТ +</a></li>
                                            <li><a class="dropdown-item" href="<?= Url::to(['rate/index'])?>">Мои ставки</a></li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li><a class="dropdown-item" href="<?= Url::to(['user/logout'])?>">Выход</a></li>
                                        </ul>
                                    </li>
                                <?php endif; ?>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
