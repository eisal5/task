<?php require 'utils.php'; ?>
<?php $page_sub_title = "show"; ?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>+vitamin</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<header>
    <?php include 'parts/header.php'; ?>
</header>

  <div id="contents">
      <article class="show">
          <?php
              if (isset($_GET['id'])) {
                  $id = $_GET['id'];
                  $stmt = $db->query("select * from posts where id = ${id}"); //ダブルコーテーションで囲むコト
                  if ($stmt->rowCount() == 0) {
                    echo "指定された記事がありません";
                  } else {
                      foreach ($stmt as $row) {
                        $post = $row;
                      }
                  }
              } else {
                  echo "idが指定されていません。";
              }
          ?>

          <?php if (isset($post)) { ?>
              <h3>タイトル <?php echo $post['title']; ?></h3>
              <p>内容 <?php echo $post['contents']; ?></p>
              <p><img src="image.php?id=<?php echo $id; ?>" alt="" style="max-width: 300px;"></p>
              <p>投稿日時 <?php echo $post['created']; ?></p>
              <p>更新日時 <?php echo $post['updated']; ?></p>
          <?php } ?>
      </article>
  </div>

  <p class="gohome"><a href="/blog">top page</a></p>

  <footer>
      <?php include 'parts/footer.php'; ?>
  </footer>

</body>
</html>