<?php

    require_once("Database.php");

    use Trip\Database;

    $trips = $_POST; 

    if(empty($trips['destination'])){
        exit('旅行先を入力してください');
    }else if(mb_strlen($trips['destination']) > 100){
        exit('旅行先は100文字以内にしてください');
    }
    if(empty($trips['theme'])){
        exit('旅行のテーマを入力してください');
    }
    if(empty($trips['content'])){
        exit('感想を入力してください');
    }
    if(empty($trips['evaluation'])){
        exit('評価を選択してください');
    }
    if(empty($trips['companion'])){
        exit('公開ステータスを選択してください');
    }
    if(empty($trips['tripDate'])){
        exit('旅行した日を選択してください');
    }
    if(empty($trips['region'])){
        exit('地域を選択してください');
    }

    $dbh = Database::dbConnect();
    $dbh->beginTransaction();
    $sql = 'INSERT INTO 
                trip_app(destination, theme, content, evaluation, companion, tripDate, region)
            VALUES
                (:destination, :theme, :content, :evaluation, :companion, :tripDate, :region)';
    try{
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':destination', $trips['destination'], PDO::PARAM_STR);
        $stmt->bindValue(':theme', $trips['theme'], PDO::PARAM_STR);
        $stmt->bindValue(':content', $trips['content'], PDO::PARAM_STR);
        $stmt->bindValue(':evaluation', $trips['evaluation'], PDO::PARAM_INT);
        $stmt->bindValue(':companion', $trips['companion'], PDO::PARAM_INT);
        $stmt->bindValue(':tripDate', $trips['tripDate'], PDO::PARAM_STR);
        $stmt->bindValue(':region', $trips['region'], PDO::PARAM_INT);
        $stmt->execute();
        $dbh->commit();
        echo '投稿されました';
    }catch(PDOException $e){
        $dbh->rollBack();
        exit($e);
    }
?>
<p><a href="/">戻る</a></p>