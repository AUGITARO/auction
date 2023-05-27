<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $create_at
 * @property string $price
 */
class Rate extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{rate}}';
    }
}
