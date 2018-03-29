<?php

namespace Core;
use PDO;
use PDOException;

class DataBase
{
    static public function getCon()
    {
        $conf = require_once(__DIR__ . "/../app/database.php");
        if($conf['driver'] === 'mysql') {
            $host = $conf['mysql']['host'];
            $db = $conf['mysql']['db'];
            $user = $conf['mysql']['user'];
            $pass = $conf['mysql']['pass'];

            try {
                $pdo = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
                return $pdo;
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
}