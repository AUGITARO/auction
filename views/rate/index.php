<?php

/** @var yii\web\View $this */
/** @var app\models\Rate[] $rates */

use \yii\helpers\Html;
use yii\helpers\Url;

?>

<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col">
                <h1>Мои ставки</h1>
                <table class="table table-bordered table-dark mt-4">
                    <tbody>

                        <?php foreach($rates as $rate): ?>
                            <tr>
                                <td style="width: 350px;">
                                    <img
                                        src="./uploads/<?= $rate->lot->picture_path ?>"
                                        alt=""
                                        style="width: 80px; height: 80px; object-fit: cover; object-position: center;"
                                    >
                                    <a  class="link-light"
                                        href="<?= Url::to(['lot/view', 'lot_id' => $rate->lot_id]) ?>"
                                    ><?= Html::encode($rate->lot->name) ?></a>
                                </td>

                                <td class=" align-middle"><?= Html::encode($rate->lot->category->name) ?></td>
                                <td class=" align-middle"><?= Html::encode($rate->lot->completion_date) ?></td>
                                <td class=" align-middle"><?= number_format($rate->price, thousands_separator: ' ') ?> &#8381;</td>
                                <td class=" align-middle"><?= date('d.m.y в H:i', strtotime($rate->created_at)) ?></td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>