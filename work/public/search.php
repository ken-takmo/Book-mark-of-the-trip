<?php

require_once('../app/functions.php');
require_once('../app/Utils.php');
use Trip\Utils;
use Trip\Functions;

$regions = Utils::getRegions();
$requirement = $_POST;

$destination = '%' . $requirement['destination'] . '%';
$evaluation = $requirement['evaluation'];
$companion = $requirement['companion'];
$tripDate = $requirement['tripDate'];
$region = $requirement['region'];

$results = Functions::searchTrip($destination, $evaluation, $companion,);
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
    <?php include("../app/header.php"); ?>
    <H1>検索結果</H1>
    <p><?= str_replace('%', '', $destination) . " " . $evaluation . " "  . Functions::setCompanion($companion) ?> で検索</p>
    <hr>
    <main>

        <div class="trip-datas">
            <?php foreach($results as $result): ?>
            <div class="trip-data">
                <div class="trip-data-main">
                    <div class="trip-theme">
                        <p><?= $result['theme'] ?></p>
                    </div>
                    <div class="trip-destination">
                        <p><?= $result['destination'] ?></h3>
                    </div>
                </div>
                <div class="trip-details">
                    <small>評価</small>
                    <p class="detail"><?= $result['evaluation'] ?></p>
                    <small>誰と</small>
                    <p class="detail"><?= Functions::setCompanion($result['companion']) ?></p>
                    <small>地域</small>
                    <p class="detail"><?= $regions[$result['region'] - 1] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php include("../app/footer.html"); ?>
    </main>
    <script>
        const toDetail = (id) => {
            location.href = `./detail.php?id=${id}`;
        };
    </script>
</body>
</html>