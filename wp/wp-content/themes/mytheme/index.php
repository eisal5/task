<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>

<div class="article">
    <?php if (have_posts()) : ?>
        <?php while(have_posts()) : ?>
            <?php the_post(); ?>
            <p id="data"><?php echo get_the_date(); ?></p>
            <p id="category"><?php the_category(); ?></p>
            <p id="tags"><?php the_tags(); ?></p>
            <a id="main" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            <?php the_post_thumbnail(); ?>
            <p><?php the_content(); ?></p>
        <?php endwhile; ?>
    <?php endif; ?>
</div>





</body>
</html>