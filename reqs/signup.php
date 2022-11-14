<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require '../vendor/autoload.php';

use Src\Register as Register;
use http\Header;
use Src\Db as Db;
use PDO;

session_start();

echo '<pre>',print_r($_POST),'</pre>';

$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];
$register = new Register();
$_SESSION['message'] = '11';
$register->registration($username, $email, $password, $password_confirm);
echo '<pre>',print_r(111),'</pre>';
