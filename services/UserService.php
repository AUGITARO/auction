<?php

namespace app\services;

use app\models\forms\SignupForm;
use app\models\User;
use Yii;

class UserService
{
    public function create(SignupForm $signup_form): bool
    {
        $user = new User();
        $user->email = $signup_form->email;
        $user->password_hash = Yii::$app->security->generatePasswordHash($signup_form->password);
        $user->username = $signup_form->username;
        $user->contacts = $signup_form->contacts;

        if (isset($signup_form->avatar)) {
            $avatar_path = uniqid($signup_form->avatar->baseName . '_') . '.' . $signup_form->avatar->extension;
            $signup_form->avatar->saveAs('uploads/' . $avatar_path);
            $user->avatar_path = $avatar_path;
        }

        return $user->save();
    }
}
