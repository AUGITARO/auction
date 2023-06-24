<?php

namespace app\models\forms;

use app\models\User;
use yii\base\Model;

class LoginForm extends Model
{
    public $email;
    public $password;

    public function rules(): array
    {
        return [
            [['email'], 'trim'],
            [['email'], 'required'],
            [['email'], 'string', 'max' => 128],
            [['email'], 'email'],

            [['password'], 'trim'],
            [['password'], 'required'],
            [['password'], 'string', 'max' => 128],
            [['password'], 'validatePassword']
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'email' => 'Логин',
            'password' => 'Пароль',
        ];
    }

    public function validatePassword($attribute, $params): void
    {
        if (!$this->hasErrors()) {
            $user = User::findOne(['email' => $this->email]);
            if (!$user || !$user->validatePasswordHash($this->password)) {
                $this->addError($attribute, 'Неправильный email или пароль');
            }
        }
    }
}


