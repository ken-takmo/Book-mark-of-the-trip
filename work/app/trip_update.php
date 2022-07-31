<?php
    require_once __DIR__ . "/config.php";

    use Trip\Database;

    $pdo = Database::getInstance();

    $trip = $_POST;

    if(empty($trip['destination'])){
        exit('旅行先を入力してください');
    }else if(mb_strlen($trip['destination']) > 100){
        exit('旅行先は191文字以内にしてください');
    }
    if(empty($trip['theme'])){
        exit('旅行のテーマを入力してください');
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

    $pdo->beginTransaction();
    $sql = 'UPDATE  
                trip_app SET 
                destination = :destination, 
                theme = :theme,
                content = :content, 
                evaluation = :evaluation, 
                companion = :companion, 
                tripDate = :tripDate,
                region = :region
            WHERE 
                id = :id';
    try{
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':destination', $trip['destination'], \PDO::PARAM_STR);
        $stmt->bindValue(':theme', $trip['theme'], PDO::PARAM_STR);
        $stmt->bindValue(':content', $trip['content'], \PDO::PARAM_STR);
        $stmt->bindValue(':evaluation', $trip['evaluation'], \PDO::PARAM_INT);
        $stmt->bindValue(':companion', $trip['companion'], \PDO::PARAM_INT);
        $stmt->bindValue(':tripDate', $trip['tripDate'], \PDO::PARAM_STR);
        $stmt->bindValue(':region', $trip['region'], \PDO::PARAM_INT);
        $stmt->bindValue(':id', $trip['id'], \PDO::PARAM_INT);
        $stmt->execute();
        $pdo->commit();
        echo '更新されました';
    }catch(PDOException $e){
        $pdo->rollBack();
        exit($e);
    }
    ?>
    <p><a href="../public/list.php">戻る</a></p>