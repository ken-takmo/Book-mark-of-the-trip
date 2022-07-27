<?php
    require_once('functions.php');
    use Trip\Functions;

    $trips = Functions::getAll();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>旅行のしおり</title>
</head>
<body>
    <h1>しおり一覧</h1>
    <p><a href="/postForm.html">投稿</a></p>
    <p><a href="/search_form.html">検索</a></p>
    <div class="trip-datas">
        <?php foreach($trips as $trip): ?>
        <div class="trip-data">
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
                <p><a href="/update_form.php?id=<?= $trip['id'] ?>">編集</a></p>
                <p><a href="/detail.php?id=<?= $trip['id'] ?>">詳細</a></p>
                <p><a href="/trip_delete.php?id=<?= $trip['id'] ?>">削除</a></p>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>