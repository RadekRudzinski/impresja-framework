<?php

namespace impresja\models;

use impresja\impresja\Application;
use impresja\impresja\Model;

class LoginForm extends Model
{
    public string $email = '';
    public string $password = '';

    public function attributes(): array
    {
        return ['email', 'password'];
    }

    protected function labels(): array
    {
        return [
            'email' => 'Email',
            'password' => 'Hasło'
        ];
    }

    public function rules(): array
    {
        return [
            'email' => [self::RULE_REQUIRED, self::RULE_EMAIL],
            'password' => [self::RULE_REQUIRED]
        ];
    }

    public function login()
    {
        $user = User::findOne(['email' => $this->email]);
        if (!$user) {
            $this->addError('email', 'Błędny login lub hasło');
            return false;
        }
        if (!password_verify($this->password, $user->password)) {
            $this->addError('email', 'Błędne hasło lub login');
            return false;
        }

        return Application::$app->login($user);
    }
}
