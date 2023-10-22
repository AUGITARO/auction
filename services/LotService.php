<?php

namespace app\services;

use app\models\forms\CreateLotForm;
use app\models\Lot;
use Yii;

class LotService
{
    public function create(CreateLotForm $lot_form): bool
    {
        $lot = new Lot();

        $lot->name = $lot_form->name;
        $lot->description = $lot_form->description;
        $lot->start_price = $lot_form->start_price;
        $lot->completion_date = $lot_form->completion_date;
        $lot->rate_step = $lot_form->rate_step;
        $lot->category_id = $lot_form->category_id;
        $lot->user_id = Yii::$app->user->id;

        if (isset($lot_form->picture)) {
            $picture_path = uniqid($lot_form->picture->baseName . '_') . '.' . $lot_form->picture->extension;
            $lot_form->picture->saveAs('uploads/' . $picture_path);
            $lot->picture_path = $picture_path;
        }

//        $lot->validate();
//        var_dump($lot->errors);
//        exit;

        return $lot->save();
    }
}
