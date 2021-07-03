<?php

namespace app\models;

use Yii;
use yii\base\Model;

class RegisterForm extends Model
{
    public $username;
    public $password;
    public $email;
    public $confirmPassword;

    public function rules()
    {
        return [
            // обязательные поля
            [['username', 'password', 'confirmPassword', 'email'], 'required'],
            // обязательное обозначение для эл. почты
            ['email', 'email'],
            // Правило на повтор пароля
            ['confirmPassword', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    // функция записи данных нового пользователя в БД
    public function signup(){
    $user = new User();
    $user->username = $this->username;
    $user->password = $this->password;
    $user->email = $this->email;
    if($user->save()){
      return $user;
    }
    return false;
  }
}
