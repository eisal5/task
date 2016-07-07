<?php
    require 'utils.php';
    $id = $_GET['id'];
    $post = get_post($id);
    // print_r($post);
    // echo($post['image_path']);
    if (empty($post['file_type'])) {
        $file_type = "image/png";
    } else {
        $file_type = $post['file_type'];
    }

    $content_type = "Content-Type: ${file_type}";
    // echo $content_type;
    header($content_type); //Content-Type: image/jpg÷
    echo file_get_contents($post['image_path']);
?>