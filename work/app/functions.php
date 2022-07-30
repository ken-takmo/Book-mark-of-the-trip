<?php
    namespace Trip;

    require_once('Database.php');

    use Trip\Database;

    class Functions
    {   
        public static function getAll() {
            $dbh = Database::dbConnect();
            $stmt = $dbh->query("SELECT * FROM trip_app");
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public static function getDetail($id) {
            if(empty($id)) {
                echo "IDが不正です";
                exit();
            }
            $dbh = Database::dbConnect();
            $stmt = $dbh->prepare("SELECT * FROM trip_app WHERE id = :id");
            $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if(!$result){
                echo "その投稿はありません";
                exit();
            }
            return $result;
        }

        public static function deleteTrip($id) {
            if(empty($id)) {
                echo "IDが不正です";
            }
            $dbh = Database::dbConnect();
            $dbh->beginTransaction();
            $sql = 'DELETE FROM trip_app WHERE id = :id';
            try{
                $stmt = $dbh->prepare($sql);
                $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
                $stmt->execute();
                $dbh->commit();
                echo '削除されました';
            }catch(PDOException $e){
                $dbh->rollBack();
                exit($e);
            }
        }

        public static function searchTrip($destination, $evaluation, $companion) {
            $dbh = Database::dbConnect();
            $sql = 'SELECT * FROM trip_app WHERE destination LIKE :destination AND evaluation = :evaluation AND companion = :companion';
            $stmt = $dbh->prepare($sql);
            $stmt->bindValue(':destination', $destination, \PDO::PARAM_STR);
            $stmt->bindValue(':evaluation', $evaluation, \PDO::PARAM_INT);
            $stmt->bindValue(':companion', $companion, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if(!$result) {
                echo '条件に当てはまる投稿がありません';
            }
            return $result;
        }

        public static function setCompanion($int){
            switch($int){
                case 1:
                    return "ひとり";
                    break;
                case 2:
                    return "友人";
                    break;
                case 3:
                    return "恋人・パートナー";
                    break;
                case 4:
                    return "家族";
                    break;
            }
        }
    }