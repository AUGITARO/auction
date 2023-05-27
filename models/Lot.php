<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $create_at
 * @property string $name
 * @property string $discription
 * @property string $picture
 * @property string $start_price
 * @property string $completion_date
 * @property string $rate_step
 */
class Lot extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{lot}}';
    }
}
