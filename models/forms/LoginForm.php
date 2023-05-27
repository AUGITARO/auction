<?php

namespace app\models\forms;

use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;

    public function rules(): array
    {
        return [
            [["email"], "trim"],
            [["email"], "required"],
            [["email"], "string", "max" => 128],
            [["email"], "email"],

            [["password"], "trim"],
            [["password"], "required"],
            [["password"], "string", "max" => 128],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'email' => 'Логин',
            'password' => 'Пароль',
        ];
    }
}
