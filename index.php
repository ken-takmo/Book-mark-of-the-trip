<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/css/style.css" />
    <title>Home</title>
  </head>
  <body>
    <?php include("./work/app/header.php"); ?>
    <main class="home">
      <h1>旅のしおり共有</h1>
      <div class="image-links">
        <div class="post-link" onclick="toPostForm()">
          <img src="/img/bookmark.jpg" alt="投稿リンク画像" class="post-link-img"/>
          <p class="post-link-p">投稿</p>
        </div>
        <div class="list-link" onclick="toList()">
          <img src="/img/list.png" alt="一覧リンク画像" class="list-link-img"/>
          <p class="list-link-p">しおり一覧</p>
        </div>
      </div>
    </main>
    <?php include("./work/app/footer.html"); ?>
  </body>
</html>
