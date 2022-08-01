<?php
    namespace Trip;

    require_once('Database.php');

    use Trip\Database;

    class Functions
    {   
        private $pdo;
        public function __construct($pdo){
            $this->pdo = $pdo;
        }

        public function getAll() {
            $stmt = $this->pdo->query("SELECT * FROM trip_app");
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
            return $result;
        }

        public function getDetail($id) {
            if(empty($id)) {
                echo "IDが不正です";
                exit();
            }
            $stmt = $this->pdo->prepare("SELECT * FROM trip_app WHERE id = :id");
            $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(\PDO::FETCH_ASSOC);

            if(!$result){
                echo "その投稿はありません";
                exit();
            }
            return $result;
        }

        public function deleteTrip($id) {
            if(empty($id)) {
                echo "IDが不正です";
            }
            $this->pdo->beginTransaction();
            $sql = 'DELETE FROM trip_app WHERE id = :id';
            try{
                $stmt = $this->pdo->prepare($sql);
                $stmt->bindValue(':id', (int)$id, \PDO::PARAM_INT);
                $stmt->execute();
                $this->pdo->commit();
                echo '削除されました';
            }catch(PDOException $e){
                $this->pdo->rollBack();
                exit($e);
            }
        }

        public function searchTrip($destination, $evaluation, $companion, $region) {
            $sql = 'SELECT * FROM trip_app 
            WHERE destination LIKE :destination 
            AND evaluation = :evaluation 
            AND companion = :companion 
            AND region = :region';
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindValue(':destination', $destination, \PDO::PARAM_STR);
            $stmt->bindValue(':evaluation', $evaluation, \PDO::PARAM_INT);
            $stmt->bindValue(':companion', $companion, \PDO::PARAM_INT);
            $stmt->bindValue(':region', $region, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);

            if(!$result) {
                echo '条件に当てはまる投稿がありません';
            }
            return $result;
        }

        public function setCompanion($int){
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