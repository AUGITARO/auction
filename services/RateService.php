<?php

namespace app\services;

use app\models\forms\CreateRateForm;
use app\models\Rate;
use Yii;

class RateService
{
    public function create(CreateRateForm $model): bool
    {
        $rate = new Rate();
        $rate->price = $model->price;
        $rate->user_id = $model->user_id;
        $rate->lot_id = $model->lot_id;

        return $rate->save();
    }
}
