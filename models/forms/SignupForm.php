<?php

namespace app\models\forms;

use app\models\User;
use yii\base\Model;

class SignupForm extends Model
{
    public $email;
    public $password;
    public $password_repeat;
    public $username;
    public $contacts;
    public $avatar;

    public function rules(): array
    {
        return [
            [['email'], 'trim'],
            [['email'], 'required'],
            [['email'], 'string', 'max' => 128],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'email'],

            [['password'], 'trim'],
            [['password'], 'required'],
            [['password'], 'string', 'max' => 128],

            [['password_repeat'], 'trim'],
            [['password_repeat'], 'required'],
            [['password_repeat'], 'string', 'max' => 128],
            [['password_repeat'], 'compare', 'compareAttribute' => 'password'],

            [['username'], 'trim'],
            [['username'], 'required'],
            [['username'], 'string', 'max' => 128],
            [['username'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'username'],

            [['contacts'], 'trim'],
            [['contacts'], 'string', 'max' => 128],

            [['avatar'], 'required'],
            [['avatar'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels(): array
    {
        return [
            'email' => 'Логин',
            'password' => 'Пароль',
            'password_repeat' => 'Повторите пароль',
            'username' => 'Имя',
            'contacts' => 'Контактная информация',
            'avatar' => 'Фото профиля',
        ];
    }
}
