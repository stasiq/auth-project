<?php

namespace Src;

use \PDO;

class Settings
{
    public static $driver = 'mysql';
    public static $host = 'localhost';
    public static $db_name = 'auth_users';
    public static $db_user = 'root';
    public static $db_pass = 'root';
    public static $charset = 'utf8';
    public static $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
}