<?php

namespace app\models\forms;

use app\models\Category;
use app\models\User;
use yii\base\model;

class CreateLotForm extends Model
{
    public $name;
    public $description;
    public $start_price;
    public $completion_date;
    public $rate_step;
    public $category_id;
    public $user_id;
    public $picture;

    public function rules(): array
    {
        return [
            [['name'], 'trim'],
            [['name'], 'required'],
            [['name'], 'string', 'max' => 128],

            [['description'], 'trim'],
            [['description'], 'string', 'max' => 512],

            [['start_price'], 'required'],
            [['start_price'], 'integer', 'min' => 1],

            [['completion_date'], 'trim'],
            [['completion_date'], 'required'],
            [['completion_date'], 'string'],
//            [['completion_date'], 'date', 'format' => 'Y-m-d'],

            [['rate_step'], 'required'],
            [['rate_step'], 'integer', 'min' => 1],

            [['category_id'], 'required'],
            [['category_id'], 'integer'],
            [['category_id'], 'exist', 'targetClass' => Category::class, 'targetAttribute' => 'id'],

            [['user_id'], 'required'],
            [['user_id'], 'integer'],
            [['user_id'], 'exist', 'targetClass' => User::class, 'targetAttribute' => 'id'],

            [['picture'], 'required'],
            [['picture'], 'file', 'extensions' => 'png, jpg, jpeg', 'maxSize' => 1048576 * 2],
        ];
    }
    
    public function attributeLabels(): array
    {
        return [
            'name' => 'Наименование',
            'description' => 'Описание',
            'start_price' => 'Начальная цена',
            'completion_date' => 'Дата окончания',
            'rate_step' => 'Шаг ставки',
            'category_id' => 'Выберите категорию',
            'picture' => 'Выберите фото лота',
        ];
    }
}