<?php
    require_once('functions.php');
    require_once('Utils.php');

    use Trip\Utils;
    use Trip\Functions;

    $regions = Utils::getRegions();

    $trip = Functions::getDetail($_GET['id']);
    $id = $trip['id'];
    $destination = $trip['destination'];
    $theme = $trip['theme'];
    $content = $trip['content'];
    $evaluation = $trip['evaluation'];
    $companion = $trip['companion'];
    $tripData = $trip['tripDate'];
    $region = $trip['region'];
?>
<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>しおり編集</title>
  </head>
  <body>
    <h1>しおり編集</h1>
    <p><a href="/index.php">しおり一覧</a></p>
    <form action="trip_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
      <p>旅行先</p>
      <input type="text" name="destination" value="<?= $destination ?>"/>
      <p>旅行テーマ</p>
      <textarea name="theme" cols="30" rows="10"><?= $theme ?></textarea>
      <p>感想</p>
      <textarea name="content" cols="30" rows="10" ><?= $content ?></textarea>
      <p>評価(5段階評価)</p>
      <select name="evaluation">
        <option value="1" <?php if((int)$evaluation === 1) echo "selected" ?>>1</option>
        <option value="2" <?php if((int)$evaluation === 2) echo "selected" ?>>2</option>
        <option value="3" <?php if((int)$evaluation === 3) echo "selected" ?>>3</option>
        <option value="4" <?php if((int)$evaluation === 4) echo "selected" ?>>4</option>
        <option value="5" <?php if((int)$evaluation === 5) echo "selected" ?>>5</option>
      </select>
      <p>誰と</p>
      <select name="companion">
        <option value="1" <?php if((int)$companion === 1) echo "selected" ?>>ひとり</option>
        <option value="2" <?php if((int)$companion === 2) echo "selected" ?>>友人</option>
        <option value="3" <?php if((int)$companion === 3) echo "selected" ?>>恋人・パートナー</option>
        <option value="4" <?php if((int)$companion === 4) echo "selected" ?>>家族</option>
      </select>
      <p>旅行日</p>
      <input name="tripDate" type="date" value="<?= $tripData ?>"/>
      <p>地域</p>
      <select name="region">
        <?php for($i = 0; $i <= 46; $i++): ?>
            <option value="<?= $i + 1 ?>" <?php if((int)$region === $i + 1) echo "selected" ?>><?= $regions[$i] ?></option>
          <?php endfor; ?>
        </select>
      <br />
      <input type="submit" value="更新" />
    </form>
  </body>
</html>