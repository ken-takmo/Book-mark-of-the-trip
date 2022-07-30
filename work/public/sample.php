<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/style.css" />
    <title>Document</title>
  </head>
  <body>
    <?php include("../app/header.php"); ?>
    <div class="sample">
      <div class="s2">main</div>
      <div class="s3">
        <form action="#">
          <label for="destination">旅行先</label>
          <input type="text" id="destinaion">
          <br>
          <label for="evaluation">評価</label>
          <select name="" id="evaluation">
            <option value=""></option>
          </select>
          <label for="region">地域</label>
          <select name="" id="region">
            <option value=""></option>
          </select>
          <label for="companion">誰と</label>
          <select name="" id="companion">
            <option value=""></option>
          </select>
        </form>
      </div>
    </div>
    <?php include("../app/footer.html"); ?>
  </body>
</html>
