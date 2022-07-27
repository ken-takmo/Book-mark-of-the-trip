<?php

require_once('../app/functions.php');
require_once('../app/Utils.php');
use Trip\Utils;
use Trip\Functions;

$regions = Utils::getRegions();
$requirement = $_POST;

$destination = $requirement['destination'];
$evaluation = $requirement['evaluation'];
$companion = $requirement['companion'];

$results = Functions::searchTrip($destination, $evaluation, $companion);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>検索結果</title>
</head>
<body>
    <H1>検索結果</H1>
    <p><?= $destination . " " . $evaluation . " "  . Functions::setCompanion($companion) ?> で検索</p>
    <p><a href="../../index.php">しおり一覧</a></p>
    <hr>
    <div class="trip-datas">
        <?php foreach($results as $result): ?>
        <div class="trip-data">
            <div>
                <h3>旅行先：<?= $result['destination'] ?></h3>
            </div>
            <hr>
            <p>旅行テーマ:<?= $result['theme'] ?></p>
            <p>感想：<?= $result['content'] ?></p>
            <hr>
            <div>
                <p>評価：<?= $result['evaluation'] ?></p>
                <p>誰と：<?= Functions::setCompanion($result['companion']) ?></p>
                <p>旅行日：<?= $result['tripDate'] ?></p>
                <p>地域：<?= $regions[$result['region'] - 1]?></p>
                <p><a href="./update_form.php?id=<?= $result['id'] ?>">編集</a></p>
                <p><a href="./detail.php?id=<?= $result['id'] ?>">詳細</a></p>
                <p><a href="../app/trip_delete.php?id=<?= $result['id'] ?>">削除</a></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>