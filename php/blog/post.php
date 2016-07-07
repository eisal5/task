<?php require 'utils.php'; ?>
<?php $page_sub_title = "post"; ?>

<?php
//編集と新規作成の判定
    $mode = 'new';
    if (is_edit($_POST, 'type')) {
        $mode = 'edit';
        $id = $_POST['id'];
    }

    if (is_empty($_POST, 'title')) {
      $error = "タイトルを設定してください";
    } else if (is_empty($_POST, 'contents')) {
      $error = "内容を設定してください";
    } else {
        $title = $_POST['title'];
        $contents = $_POST['contents'];
        $image = $_FILES['image'];

        if ($mode == 'edit') {
            update_post($id, $title, $contents, $image);
        } else {
            create_post($title, $contents, $image);
        }
    }

    if (empty($error)) {
        $page_title = "記事を作成しました";
    } else {
        $page_title = "エラー！";
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

  <div id="contents" class="<?php if (!empty($error)) echo "error"; ?>">
      <?php if (!empty($error)) : ?>
          <p><?php echo $error; ?></p>
          <?php if ($mode == 'edit') : ?>
              <p><a href="edit.php?id=<?php echo $id; ?>">to edit page</a></p>
          <?php else: ?>
              <p><a href="new.php">to Create</a></p>
          <?php endif; ?>
      <?php endif; ?>
      <a href="index.php">to top</a>
  </div>

  <footer>
      <?php include 'parts/footer.php'; ?>
  </footer>
</body>
</html>