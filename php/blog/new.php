<?php require 'utils.php'; ?>
<?php $page_sub_title = "new"; ?>

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
    <article>
        <form action="post.php" method="post" name="form" enctype="multipart/form-data">
            <div>
                <label for="title">
                    タイトル
                    <input type="text" name="title">
                </label>
            </div>

            <div>
                <label for="contents">
                    内容
                    <textarea name="contents" id="" cols="30" rows="10"></textarea>
                </label>
            </div>

            <div>
                <label for="image">
                   画像
                   <input type="file" name="image">
                </label>
            </div>

            <div>
                <input type="submit" value="送信">
            </div>
        </form>
    </article>
  </div>

  <footer>
      <?php include 'parts/footer.php'; ?>
  </footer>
</body>
</html>