<?php
require_once('../app/Utils.php');
use Trip\Utils;

$regions = Utils::getRegions();
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/style.css" />
    <title>検索フォーム</title>
  </head>
  <body>
    <?php include("../app/header.php"); ?>
    <main class="search-form">
      <h1>検索フォーム</h1>
      <form action="./search.php" method="POST">
        <label for="destination">旅行先</label>
        <input type="text" name="destination" id="destination" />
        <br>
        <div class="selecter">
          <label for="evaluation">評価</label>
          <select name="evaluation" id="evaluation">
            <option value="all">全て</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
          <label for="companion">誰と</label>
          <select name="companion" id="companion">
            <option value="all">全て</option>
            <option value="1">ひとり</option>
            <option value="2">友人</option>
            <option value="3">恋人・パートナー</option>
            <option value="4">家族</option>
          </select>
          <label for="region">地域</label>
          <select name="region" id="region">
            <option value="all">全て</option>
            <?php for($i = 0; $i <= 46; $i++): ?>
              <option value="<?= $i + 1 ?>"><?= $regions[$i] ?></option>
            <?php endfor; ?>
          </select>
        </div>
        <br />
        <br />
        <input type="submit" value="検索" />
      </form>
    </main>
    <?php include("../app/footer.html"); ?>
  </body>
</html>
