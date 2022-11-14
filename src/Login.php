<?php

namespace Src;

use http\Header;
use Src\Db;
use PDO;

class Login
{
    public function auth($username, $password) {
        $db = new Db();

        $args = [
            'username' => $username,
            'password' => $password,
        ];

        $stmt = $db->prepare("SELECT * FROM users WHERE name = :username  and password = :password");
        $stmt->execute($args);
        $user = $stmt->fetch();

        if (is_array($user)) {

            return true;
        } else {
            $_SESSION['message'] = 'Неверный логин или пароль';
            return false;
        }
    }
}