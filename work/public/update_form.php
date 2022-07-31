<?php
    require_once __DIR__ . "/../app/config.php";

    use Trip\Utils;
    use Trip\Functions;
    use Trip\Database;

    $pdo = Database::getInstance();
    $regions = Utils::getRegions();
    $func = new Functions($pdo);

    $trip = $func->getDetail($_GET['id']);
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
    <link rel="stylesheet" href="../../css/style.css">
    <title>しおり編集</title>
  </head>
  <body>
    <?php include("../app/header.php"); ?>
    <main class="update-form">
      <h1>しおり編集</h1>
      <form action="../app/trip_update.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <label for="destination">旅行先</label>
        <input type="text" name="destination" id="destination"value="<?= $destination ?>"/>
        <br>
        <label for="theme">旅行テーマ</label>
        <textarea name="theme" id="theme" cols="30" rows="10"><?= $theme ?></textarea>
        <br>
        <label for="content">感想</label>
        <textarea name="content" id="content" cols="30" rows="10" ><?= $content ?></textarea>
        <br>
        <div class="selecter">
          <label for="evaluation">評価(5段階評価)</label>
          <select name="evaluation" id="evaluation">
            <option value="1" <?php if((int)$evaluation === 1) echo "selected" ?>>1</option>
            <option value="2" <?php if((int)$evaluation === 2) echo "selected" ?>>2</option>
            <option value="3" <?php if((int)$evaluation === 3) echo "selected" ?>>3</option>
            <option value="4" <?php if((int)$evaluation === 4) echo "selected" ?>>4</option>
            <option value="5" <?php if((int)$evaluation === 5) echo "selected" ?>>5</option>
          </select>
          <label for="companion">誰と</label>
          <select name="companion" id="companion">
            <option value="1" <?php if((int)$companion === 1) echo "selected" ?>>ひとり</option>
            <option value="2" <?php if((int)$companion === 2) echo "selected" ?>>友人</option>
            <option value="3" <?php if((int)$companion === 3) echo "selected" ?>>恋人・パートナー</option>
            <option value="4" <?php if((int)$companion === 4) echo "selected" ?>>家族</option>
          </select>
          <label for="tripDate">旅行日</label>
          <input name="tripDate" id="tripDate" type="date" value="<?= $tripData ?>"/>
          <label for="region">地域</label>
          <select name="region" id="region">
            <?php for($i = 0; $i <= 46; $i++): ?>
              <option value="<?= $i + 1 ?>" <?php if((int)$region === $i + 1) echo "selected" ?>><?= $regions[$i] ?></option>
            <?php endfor; ?>
          </select>
        </div>
        <br />
        <input type="submit" value="更新" />
      </form>
    </main>
  </body>
</html>