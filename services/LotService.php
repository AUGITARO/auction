<?php

namespace app\services;

use app\models\Lot;
use app\models\forms\CreateLotForm;

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
        $lot->user_id = $lot_form->user_id;

        if (isset($lot_form->picture)) {
            $picture_path = uniqid($lot_form->picture->baseName . '_') . '.' . $lot_form->picture->extension;
            $lot_form->picture->saveAs('uploads/' . $picture_path);
            $lot->picture_path = $picture_path;
        }

        return $lot->save();
    }

    public function getLotList(?int $category_id = null): array
    {
        $query = Lot::find();
        if (isset($category_id)) {
            $query->where(['category_id' => $category_id]);
        }

        return $query->all();
    }
}
