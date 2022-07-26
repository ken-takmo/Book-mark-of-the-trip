<?php

    namespace Trip;
    require_once('config.php');

    class Database
    {
        public static function dbConnect(){
            try{
                $dbh = new \PDO(DSN, DB_USER, DB_PASS, [
                    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                ]);
            }catch(PDOException $e) {
                echo '接続失敗' . $e->getMessage();
                exit();
            }
            return $dbh;
        }
    }