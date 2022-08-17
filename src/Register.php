<?php

namespace Src;

class Register
{
    private static $username;
    private static $email;
    private static $password;
    private static $password_confirm;
    private static $errors = [];

    public function __construct($username, $email, $password, $password_confirm)
    {
        self::$username = $username;
        self::$email = $email;
        self::$password = $password;
        self::$password_confirm = $password_confirm;
    }

    private static function validatePass()
    {
        if (self::$password !== self::$password_confirm) {
            $_SESSION['message'][] = 'Пароли не совпадают';
            self::$errors[] = 'password_confirm';
        };
    }

    public static function registration()
    {
        if (empty(self::$errors)) {
            $db = Db::getConnect();
            $sql = 'INSERT INTO `users` (`name`, `email`, `admin`, `password`)
VALUES ("self::$username", "self::$email ", NULL, "self::$password");';
            $db->query($sql);
            header('Location: ../register.php');
        }

    }
}