<?php
    require_once('../app/functions.php');
    require_once('../app/Utils.php');
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
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title>旅行のしおり</title>
</head>
<body>
    <?php include("../app/header.php"); ?>
    <h1>しおり一覧</h1>
    <div class="trip-datas">
        <div class="trip-data">
            <div class="trip-data-header" >
                <!-- <span class="material-symbols-outlined">
                flight_takeoff
                </span> -->
                <p>旅行先</p>
            </div>
            <div class="trip-data-main">
                <p>旅行テーマ</p>
            </div>
            <div class="trip-data-details">
                <p class="detail">評価</p>
                <p class="detail">誰と</p>
                <p class="detail">地域</p>
            </div>
        </div>
        <?php foreach($trips as $trip): ?>
        <div class="trip-data" data-id="<?= $trip['id'] ?>" onclick="toDetail(<?= $trip['id'] ?>)">
            <div class="trip-data-header trip-data-child" >
                <!-- <span class="material-symbols-outlined">
                flight_takeoff
                </span> -->
                <p><strong><?= $trip['destination'] ?></strong></p>
            </div>
            <div class="trip-data-main  trip-data-child" >
                <p><?= $trip['theme'] ?></p>
            </div>
            <div class="trip-data-details  trip-data-child" >
                <p class="detail"><?= $trip['evaluation'] ?></p>
                <p class="detail"><?= Functions::setCompanion($trip['companion']) ?></p>
                <p class="detail"><?= $regions[$trip['region'] - 1] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    <script>
        const toDetail = (id) => {
            location.href = `./detail.php?id=${id}`;
        };
    </script>
</body>
</html>