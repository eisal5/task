<?php require 'utils.php'; ?>
<?php $page_sub_title = "edit"; ?>

<?php
    if (is_empty($_GET, 'id')) {
        $error = "idを指定してください";
    } else {
        $id = $_GET['id'];
        $post = get_post($id);
    }
?>

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
        <?php if (isset($error)) :?>
                <p><?php echo $error; ?></p>
            <?php elseif (!isset($post)) :?>
                <p><?php echo "id=${id}の記事は存在しません"; ?></p>
        <?php else: ?>
            <form action="post.php" method="post" name="form" enctype="multipart/form-data">
                <div>
                    <label for="title">
                        タイトル
                        <input type="text" name="title" value="<?php echo $post['title']; ?>">
                    </label>
                </div>
                <div>
                    <label for="contents">
                        内容
                        <textarea name="contents" id="" cols="30" rows="10">
                        <?php echo $post['contents']; ?></textarea>
                    </label>
                </div>
                <div>
                    <?php if (!empty($post['image_name'])) : ?>
                        <img src="image.php?id=<?php echo $id; ?>">
                    <?php else: ?>
                        <?php echo "ありません" ?>
                    <?php endif; ?>
                        <label for="image">
                            画像ファイル
                            <input type="file" name="image">
                        </label>
                <div>

                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    <input type="hidden" name="type" value="edit">
                    <input type="submit" value="送信">
                </div>
            </form>
        <?php endif; ?>
    </article>
  </div>

  <footer>
      <?php include 'parts/footer.php'; ?>
  </footer>
</body>
</html>