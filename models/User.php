<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * @property int $id
 * @property string $create_at
 * @property string $email
 * @property string $password_hash
 * @property string $username
 * @property string $contacts
 * @property string $avatar_path
 */
class User extends ActiveRecord implements IdentityInterface
{
    public function rules(): array
    {
        return [
            [['email'], 'trim'],
            [['email'], 'required'],
            [['email'], 'string', 'max' => 128],
            [['email'], 'email'],
            [['email'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'email'],

            [['password_hash'], 'trim'],
            [['password_hash'], 'required'],
            [['password_hash'], 'string', 'max' => 128],

            [['username'], 'trim'],
            [['username'], 'required'],
            [['username'], 'string', 'max' => 128],
            [['username'], 'unique', 'targetClass' => User::class, 'targetAttribute' => 'username'],

            [['contacts'], 'trim'],
            [['contacts'], 'string', 'max' => 128],

            [['avatar_path'], 'required'],
            [['avatar_path'], 'file', 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    // IdentityInterface
    public static function tableName(): string
    {
        return '{{user}}';
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }

    public function validatePasswordHash(string $password): bool
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }
}
