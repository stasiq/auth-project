<?php

namespace Src;

use Src\Db;
use PDO;

class UsersModel
{
    public static function getItem($id)
    {
        $db = Db::getConnect();
        $sql = 'SELECT * FROM users WHERE id = 1';
        $query = $db->query($sql);
        $row = $query->fetch(PDO::FETCH_OBJ);
        return $row;
    }

    public static function getCount()
    {
        $db = Db::getConnect();
        $query = $db->query("SELECT COUNT(*) as count FROM auth_users");
        $count = $query->fetchColumn();
        return $count;
    }

    public static function getList($limit, $offset)
    {
        $db = Db::getConnect();
        $query = $db->query("SELECT * FROM auth_users ORDER BY idate DESC LIMIT $limit OFFSET $offset");
        $rows = [];
        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $rows[] = $row;
        }
        return $rows;
    }
}