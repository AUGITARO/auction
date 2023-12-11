<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $created_at
 * @property int $price
 * @property int $user_id
 * @property int $lot_id
 *
 * @property Lot $lot
 * @property User $user
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
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],

            [['lot_id'], 'required'],
            [['lot_id'], 'integer'],
            [['lot_id'], 'exist', 'targetClass' => Lot::class, 'targetAttribute' => 'id'],
        ];
    }

    public function getUser(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function getlot(): ActiveQuery
    {
        return $this->hasOne(Lot::class, ['id' => 'lot_id']);
    }
}
