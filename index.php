<?php
session_start();
require 'vendor/autoload.php';

use Monolog\Logger;
use Faker\Factory as Faker;
use Src\User;
use Src\Db as Db;
use Src\UsersModel as Users;
use Src\Register as Register;

$fakerBio = Faker::create('ru_RU');
$user = new User($fakerBio->name, $fakerBio->userName . rand(10, 100));
//dump($user);

//$data = Users::getItem(1);

$register = new Register();
//$register->test();

echo $data->name;
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<!--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-mb5">
            <form action="reqs/signin.php" method="post" class="mt-5">
                <div class="mb-3">
                    <label for="username" class="form-label">Логин</label>
                    <input name="username"  class="form-control" id="username"
                           placeholder="Username1337">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input required name="password" type="password" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="mb-3 form-check">
                    <input required type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div>
                <?php
                if ($_SESSION['message']) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php
                        echo $_SESSION['message'] . '<br>';
                        $_SESSION['message'] = '';
                        ?>
                    </div>
                    <?php
                }
                ?>
                <button type="submit" class="btn btn-primary">Submit</button>
                <p>Нет аккаунта? - <a href="/register.php">Регистрация</a></p>
            </form>
        </div>
    </div>
</div>
</body>
</html>