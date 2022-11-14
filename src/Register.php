<?php

namespace Src;

use http\Header;
use Src\Db;
use PDO;

class Register
{

    public static function validatePass($password, $password_confirm)
    {
        $_SESSION['message'] = [];
        if ($password !== $password_confirm) {
            $_SESSION['message'][] = 'Пароли не совпадают';

        }

        if (strlen($password) < 8) {
            $_SESSION['message'][] = 'Необходимая длина пароля 8 символов';

        }

        if (count($_SESSION['message']) == 0) {
            return true;

        } else {
            header('Location: /register.php');
            return false;

        }
    }

    public function registration($username, $email, $password, $password_confirm)
    {
        if (self::validatePass($password, $password_confirm)) {
            $db = new Db();

            $query = "INSERT INTO users (name, email, admin, password) VALUES (:username, :email, :admin, :password)";

            $args = [
                'username' => $username,
                'email' => $email,
                'admin' => NULL,
                'password' => md5($_POST['password']),
            ];

            $db::sqlm($query, $args);
            echo 'Добавлен';
        }

    }
}