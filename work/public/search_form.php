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
    <h1>検索フォーム</h1>
    <form action="./search.php" method="POST">
      <p>場所</p>
      <input type="text" name="destination" />
      <p>評価</p>
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
      <input type="submit" value="検索" />
    </form>
  </body>
</html>