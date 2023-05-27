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

    // public function rules(): array
    // {
    //     return [
    //         [['name'], 'required'],
    //         [['symbol_code'], 'required'],
    //     ];
    // }
}
