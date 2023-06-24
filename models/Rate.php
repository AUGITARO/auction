<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $create_at
 * @propertyprice
 * @property int $user_id
 * @property int $lot_id
 */
class Rate extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{rate}}';
    }

    public function rules(): array
    {
        return [
            [['price'], 'required'],
            [['price'], 'integer'],

            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => Rate::class, 'targetAttribute' => 'user_id'],

            [['lot_id'], 'required'],
            [['lot_id'], 'integer'],
            [['lot_id'], 'exist', 'targetClass' => Rate::class, 'targetAttribute' => 'lot_id'],
        ];
    }
}
