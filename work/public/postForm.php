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
    <link rel="stylesheet" href="../../css/style.css">
    <title>しおり作成</title>
  </head>
  <body>
    <?php include("../app/header.php"); ?>
    <h1>投稿フォーム</h1>
    <form action="../app/trip_create.php" method="POST">
      <p>旅行先</p>
      <input type="text" name="destination" />
      <p>旅行テーマ</p>
      <textarea name="theme" cols="30" rows="10"></textarea>
      <p>感想</p>
      <textarea name="content" cols="30" rows="10"></textarea>
      <p>評価(5段階評価)</p>
      <select name="evaluation">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <p>誰と</p>
      <select name="companion">
        <option value="1">ひとり</option>
        <option value="2">友人</option>
        <option value="3">恋人・パートナー</option>
        <option value="4">家族</option>
      </select>
      <p>旅行日</p>
      <input name="tripDate" type="date" />
      <p>地域</p>
      <select name="region">
        <?php for($i = 0; $i <= 46; $i++): ?>
          <option value="<?= $i + 1 ?>"><?= $regions[$i] ?></option>
        <?php endfor; ?>
      </select>
      <br />
      <br />
      <input type="submit" value="投稿" />
    </form>
  </body>
</html>
