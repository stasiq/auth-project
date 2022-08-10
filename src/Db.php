<?php

namespace Src;

use \PDO;
use \PDOException;
use \PDOStatement;
use Src\Settings as Settings;

class Db
{

    static private $db;


    protected static $instance = null;

    /**
     * DB constructor.
     * @throws Exception
     */
    public function __construct()
    {
        if (self::$db === null) {
            try {

                $driver = Settings::$driver;
                $host = Settings::$host;
                $db_name = Settings::$db_name;
                $db_user = Settings::$db_user;
                $db_pass = Settings::$db_pass;
                $charset = Settings::$charset;
                $options = Settings::$options;
                self::$db = new PDO("$driver:host=$host;dbname=$db_name;charset=$charset", $db_user, $db_pass,
                    $options);

            } catch (PDOException $e) {
                throw new Exception ($e->getMessage());
            }
        }
        return self::$instance;
    }

    /**
     * @param $stmt
     * @return PDOStatement
     */
    public static function query($stmt)
    {
        return self::$db->query($stmt);
    }

    /**
     * @param $stmt
     * @return PDOStatement
     */
    public static function prepare($stmt)
    {
        return self::$db->prepare($stmt);
    }

    /**
     * @param $query
     * @return int
     */
    static public function exec($query)
    {
        return self::$db->exec($query);
    }

    /**
     * @return string
     */
    static public function lastInsertId()
    {
        return self::$db->lastInsertId();
    }

    /**
     * @param $query
     * @param  array  $args
     * @return mixed
     */
    public static function getRow($query, $args = [])
    {
        return self::run($query, $args)->fetch();
    }

    /**
     * @param $query
     * @param  array  $args
     * @return array
     */
    public static function getRows($query, $args = [])
    {
        return self::run($query, $args)->fetchAll();
    }

    /**
     * @param $query
     * @param  array  $args
     * @return mixed
     */
    public static function getValue($query, $args = [])
    {
        $result = self::getRow($query, $args);
        if (!empty($result)) {
            $result = array_shift($result);
        }
        return $result;
    }

    /**
     * @param $query
     * @param  array  $args
     * @return array
     */
    public static function getColumn($query, $args = [])
    {
        return self::run($query, $args)->fetchAll(PDO::FETCH_COLUMN);
    }

    public static function sql($query, $args = [])
    {
        self::run($query, $args);
    }
}