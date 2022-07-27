<?php
    require_once('Database.php');

    use Trip\Database;

    $trip = $_POST;

    if(empty($trip['destination'])){
        exit('旅行先を入力してください');
    }else if(mb_strlen($trip['destination']) > 100){
        exit('旅行先は191文字以内にしてください');
    }
    if(empty($trip['content'])){
        exit('感想を入力してください');
    }
    if(empty($trip['evaluation'])){
        exit('評価を選択してください');
    }
    if(empty($trip['companion'])){
        exit('一緒に行った人を選択してください');
    }
    if(empty($trip['tripDate'])){
        exit('旅行日を選択してください');
    }
    if(empty($trip['region'])){
        exit('地域を選択してください');
    }

    $dbh = Database::dbConnect();
    $dbh->beginTransaction();
    $sql = 'UPDATE  
                trip_app SET 
                destination = :destination, 
                content = :content, 
                evaluation = :evaluation, 
                companion = :companion, 
                tripDate = :tripDate,
                region = :region
            WHERE 
                id = :id';
    try{
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':destination', $trip['destination'], \PDO::PARAM_STR);
        $stmt->bindValue(':content', $trip['content'], \PDO::PARAM_STR);
        $stmt->bindValue(':evaluation', $trip['evaluation'], \PDO::PARAM_INT);
        $stmt->bindValue(':companion', $trip['companion'], \PDO::PARAM_INT);
        $stmt->bindValue(':tripDate', $trip['tripDate'], \PDO::PARAM_STR);
        $stmt->bindValue(':region', $trip['region'], \PDO::PARAM_INT);
        $stmt->bindValue(':id', $trip['id'], \PDO::PARAM_INT);
        $stmt->execute();
        $dbh->commit();
        echo '更新されました';
    }catch(PDOException $e){
        $dbh->rollBack();
        exit($e);
    }
    ?>
    <p><a href="/">戻る</a></p>