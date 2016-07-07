<?php require 'utils.php'; ?>
<?php
    $page_sub_title = "top";
    $offset = get_offset();
    $limit = 4;
    $stmt = get_db()->query("select * from posts order by updated desc limit ${limit} offset ${offset}");
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
      <?php foreach($stmt as $row): ?>
          <?php $id = $row['id']; ?>

      <article>
          <p>
              <a href="show.php?id=<?php echo $row['id']; ?>" title="">
              <?php echo($row['title']); ?>
              </a>
          </p>

          <p><?php echo($row['contents']); ?></p>
          <p><?php echo ($row['updated']); ?></p>


          <div id="edit">
              <p><a href="edit.php?id=<?php echo $id; ?>">▶︎edit article</a></p>
          </div>

          <div id="delete">
              <p><a href="delete.php?id=<?php echo $id; ?>" class="delete">▶︎delete article</a></p>
          </div>
      </article>

      <?php endforeach; ?>
  </div>

  <div class="pager">
      <?php if ($offset > 0) : ?>
          <a href="?offset=<?php echo get_prev_offset($limit); ?>">＜＜︎</a>
      <?php endif; ?>
      <?php if ($offset + $limit < get_posts_count()) : ?>
          <a href="?offset=<?php echo get_next_offset($limit); ?>">＞＞</a>
      <?php endif; ?>
      <p>総件数：<?php echo get_posts_count(); ?></p>
  </div>

  <div id="create">
      <p><a href="new.php">▶︎Create new article</a></p>
  </div>

<footer>
    <?php include 'parts/footer.php'; ?>
</footer>

<script>
    var dels = document.getElementsByClassName('delete');
    for (var i=0; i<dels.length; i++) {
        dels[i].addEventListener('click', function(e){
            if (confirm('削除してよろしいですか？')) {
                return true;
            } else {
                e.preventDefault();
                return false;
            }
        });
      }
</script>

</body>
</html>