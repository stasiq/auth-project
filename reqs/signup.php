<?php

session_start();

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password !== $password_confirm) {
    $_SESSION['message'][1] = 'Пароли не совпадают';
    $_SESSION['message'][2] = '2Пароли не совпадают';
    header('Location: ../register.php');
}
echo '<pre>'; var_dump($_POST); echo '</pre>';