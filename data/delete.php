<?php

$json = file_get_contents('posts.json');
$obj = json_decode($json, true);



if (intval($_GET['postId'])==0) {
    echo "Error";
} else {
    unset($obj['posts'][intval($_GET['postId'])]);
    unlink("images/" . $_GET['imageName']);
    echo '<script>javascript:history.back()</script>';
}




file_put_contents("posts.json", json_encode($obj));

?>