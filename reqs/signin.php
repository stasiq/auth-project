<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require '../vendor/autoload.php';

use Src\Login as Login;

session_start();

$username = $_POST['username'];
$password = md5($_POST['password']);

$user = new Login();

if ($user->auth($username,$password)) {
    echo 'good';

} else {
    $host  = $_SERVER['HTTP_HOST'];
    header("Location: http://$host/");

}




