<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $create_at
 * @property string $email
 * @property string $password_hash
 * @property string $username
 * @property string $contacts
 * @property string $avatar_path
 */
class User extends ActiveRecord
{
    public static function tableName(): string
    {
        return '{{user}}';
    }
}
