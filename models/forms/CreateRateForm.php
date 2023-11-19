<?php

namespace app\models\forms;

use app\models\User;
use app\models\Lot;
use yii\base\Model;

class CreateRateForm extends Model
{
    public $price;
    public $user_id;
    public $lot_id;

    public function rules(): array
    {
        return [
            [['price'], 'required'],
            [['price'], 'integer', 'min' => 1, 'max' => 10000],

            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],

            [['lot_id'], 'required'],
            [['lot_id'], 'integer'],
            [['lot_id'], 'exist', 'targetClass' => Lot::class, 'targetAttribute' => 'id'],
        ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'price' => 'Ставите?',
        ];
    }
}
