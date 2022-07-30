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
    <title>旅行のしおり</title>
</head>
<body>
    <?php include("../app/header.php"); ?>
    <main>
    <h1>しおり一覧</h1>
    <div class="trip-datas">
        <!-- <div class="trip-data">
            <div class="trip-data-main">
                <div class="trip-theme" >
                    <p>旅行テーマ</p>
                </div>
                <div class="trip-destination">
                    <p>旅行先</p>
                </div>
            </div>
            <div class="trip-details">
                <small>評価</small>
                <p>5</p>
                <small>誰と</small>
                <p>ひとり</p>
                <small>地域</small>
                <p>東京</p>
            </div>
        </div> -->
        <?php foreach($trips as $trip): ?>
        <div class="trip-data" data-id="<?= $trip['id'] ?>" onclick="toDetail(<?= $trip['id'] ?>)">
            <div class="trip-data-main">
                <div class="trip-theme trip-data-child" >
                    <p><?= $trip['theme'] ?></p>
                </div>
                <div class="trip-destination trip-data-child" >
                    <p><?= $trip['destination'] ?></p>
                </div>
            </div>    
            <div class="trip-details  trip-data-child" >
                <small>評価</small>
                <p class="detail"><?= $trip['evaluation'] ?></p>
                <small>誰と</small>
                <p class="detail"><?= Functions::setCompanion($trip['companion']) ?></p>
                <small>地域</small>
                <p class="detail"><?= $regions[$trip['region'] - 1] ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
    </main>
    <?php include("../app/footer.html"); ?>
    <script>
        const toDetail = (id) => {
            location.href = `./detail.php?id=${id}`;
        };
    </script>
</body>
</html>