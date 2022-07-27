<?php
    require_once('functions.php');
    use Trip\Functions;

    $trip = Functions::getDetail($_GET["id"]);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>詳細</title>
</head>
<body>
    <h1>しおり一覧</h1>
    <p><a href="/index.php">しおり一覧</a></p>
    <div class="detail-trip">
        <div>
            <h3>旅行先：<?= $trip['destination'] ?></h3>
        </div>
        <hr>
        <p>感想：<?= $trip['content'] ?></p>
        <hr>
        <div>
            <p>評価：<?= $trip['evaluation'] ?></p>
            <p>誰と：<?= Functions::setCompanion($trip['companion']) ?></p>
            <p>旅行日：<?= $trip['tripDate'] ?></p>
        </div>
    </div>
</body>
</html>