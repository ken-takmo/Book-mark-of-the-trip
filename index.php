<?php
    require_once('functions.php');
    require_once('Utils.php');
    use Trip\Functions;
    use Trip\Utils;

    $trips = Functions::getAll();
    $regions = Utils::getRegions();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>旅行のしおり</title>
</head>
<body>
    <h1>しおり一覧</h1>
    <p><a href="/postForm.php">投稿</a></p>
    <p><a href="/search_form.html">検索</a></p>
    <div class="trip-datas">
        <?php foreach($trips as $trip): ?>
        <div class="trip-data">
            <div class="trip-data-header">
                <!-- <span class="material-symbols-outlined">
                flight_takeoff
                </span> -->
                <p>旅行先：<strong><?= $trip['destination'] ?></strong></p>
            </div>
            <hr>
            <p>旅行テーマ：<?= $trip['theme'] ?></p>
            <hr>
            <div class="trip-data-details">
                <p class="detail">評価：<?= $trip['evaluation'] ?></p>
                <p class="detail">誰と：<?= Functions::setCompanion($trip['companion']) ?></p>
                <p class="detail">地域：<?= $regions[$trip['region'] - 1] ?></p>
            </div>
            <nav>
                <p class="link"><a href="/update_form.php?id=<?= $trip['id'] ?>">編集</a></p>
                <p class="link"><a href="/detail.php?id=<?= $trip['id'] ?>">詳細</a></p>
                <p class="link"><a href="/trip_delete.php?id=<?= $trip['id'] ?>">削除</a></p>
            </nav>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>