<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $create_at
 * @property string $name
 * @property string $description
 * @property string $picture_path
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

    public function rules(): array
    {
        return [
            [['name'], 'trim'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],

            [['description'], 'trim'],
            [['description'], 'string', 'max' => 512],

            [['picture_path'], 'trim'],
            [['picture_path'], 'unique', 'targetClass' => Lot::class, 'targetAttribute' => 'picture_path'],
            [['picture_path'], 'string', 'max' => 128],

            [['start_price'], 'required'],
            [['start_price'], 'integer', 'min' => 1],

            [['completion_date'], 'trim'],
            [['completion_date'], 'required'],
            [['completion_date'], 'string'],
//            [['completion_date'], 'date', 'format' => 'Y-m-d'],

            [['rate_step'], 'required'],
            [['rate_step'], 'integer', 'min' => 1],

            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => Lot::class, 'targetAttribute' => 'user_id'],

            [['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['category_id'], 'exist', 'targetClass' => Lot::class, 'targetAttribute' => 'category_id'],
        ];
    }
}
