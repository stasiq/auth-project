<?php

namespace Src;

class Register
{
    private static $username;
    private static $email;
    private static $password;
    private static $password_confirm;

    public function __construct($username, $email, $password, $password_confirm)
    {
        self::$username = $username;
        self::$email = $email;
        self::$password = $password;
        self::$password_confirm = $password_confirm;
    }

    public function validatePass()
    {
        if (self::$password !== self::$password_confirm) {
            $_SESSION['message'] = 'Пароли не совпадают';
            header('Location: ../register.php');
        };
    }
}