<?php

namespace Src;

use Src\Settings as Settings;
use PDO;

require 'Settings.php';

class Db
{
    private static $db = null;
    private static $instance = null;

    static function getConnect()
    {
        if (is_null(self::$instance)) {
            $driver = Settings::$driver;
            $host = Settings::$host;
            $db_name = Settings::$db_name;
            $db_user = Settings::$db_user;
            $db_pass = Settings::$db_pass;
            $charset = Settings::$charset;
            $options = Settings::$options;
            $instance = self::$instance;
            $instance = new self();
            $instance::$db = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass,
                $options);
        }
        return $instance::$db;
    }
}

;