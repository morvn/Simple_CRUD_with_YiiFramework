<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;

    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username', 'password'], 'string'],
            [['password'], 'string', 'min' => 6], // adjust the minimum length as needed
        ];
    }

    public function register()
    {
        if ($this->validate()) {
            return User::register($this->username, $this->password);
        }

        return null;
    }
}
