<?php
session_start();
require 'vendor/autoload.php';

use Monolog\Logger;
use Faker\Factory as Faker;
use Src\User;

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-mb5">
            <form action="reqs/signup.php" method="post" class="mt-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Логин</label>
                    <input type="text" name="username" class="form-control" id="exampleInputUsername"
                           aria-describedby="emailHelp"
                           placeholder="user123">

                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                           aria-describedby="emailHelp"
                           placeholder="user@mail.ru">

                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Пароль</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Потдверждение пароля</label>
                    <input type="password" name="password_confirm" class="form-control" id="exampleInputPassword2">
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" name="agreement" for="exampleCheck1">Согласен</label>
                </div>

                <?php
                if ($_SESSION['message']) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        foreach ($_SESSION['message'] as $message) {
                            echo $message . '<br>';
                        }
                        unset($_SESSION['message']);
                        ?>
                    </div>
                    <?php
                }
                ?>
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                <p class="mt-3">Есть аккаунт? - <a href="/">Авторизация</a></p>

            </form>
        </div>
    </div>
</div>
</body>
</html>