<?php require 'utils.php'; ?>
<?php $page_sub_title = "delete"; ?>

<?php
    if (is_empty($_REQUEST, 'id')) {
        $error = "idが指定されていません";
    } else {
        $id = $_REQUEST['id'];

        if (!is_exist($id)) {
            $error = "指定した記事がありません";
        } else {
            delete_post($id);
        }
    }

    if (isset($error)) {
        $page_title = "エラー";
    } else {
        $page_title = "id=${id}の記事が削除されました";
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

    <h2><?php echo $page_title; ?></h2>

    <div id="contents">
        <?php if (isset($error)) :?>
            <p><?php echo $error; ?></p>
        <?php endif; ?>
        <a href="/blog">go to TOP</a>
    </div>


  <footer>
      <?php include 'parts/footer.php'; ?>
  </footer>
</body>
</html>