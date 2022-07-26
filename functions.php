<?php
    namespace Trip;

    require_once('Database.php');

    use Trip\Database;

    class Functions
    {   
        public static function getAll() {
            $dbh = Database::dbConnect();
            $sql = "SELECT * FROM trip_app";
            $stmt = $dbh->query($sql);
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }
    }