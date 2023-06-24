<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $create_at
 * @property string $name
 * @property string $symbol_code
 */
class Category extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{category}}';
    }

     public function rules(): array
     {
         return [
             [['name'], 'trim'],
             [['name'], 'required'],
             [['name'], 'string', 'max' => 128],
             [['name'], 'unique', 'targetClass' => Category::class, 'targetAttribute' => 'name'],

             [['symbol_code'], 'trim'],
             [['symbol_code'], 'required'],
             [['symbol_code'], 'string', 'max' => 128],
             [['symbol_code'], 'unique', 'targetClass' => Category::class, 'targetAttribute' => 'symbol_code'],
         ];
     }
}
