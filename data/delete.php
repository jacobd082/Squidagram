<?php

$json = file_get_contents('posts.json');
$obj = json_decode($json, true);



if (intval($_GET['postId'])==0) {
    echo "Error";
} else {
    #unset($obj->posts[intval($_GET['postId'])]);
    unlink("images/" . $_GET['imageName']);
    echo '<script>javascript:history.back()</script>';
    // Log this
    $toBeLogged = "\n\nPOST DELETED @ ".date('l jS \of F Y h:i:s A')."\nAdministrator removed a post with the image file name of <<".$_GET['imageName'].">>.";
    file_put_contents('log.txt', $toBeLogged, FILE_APPEND | LOCK_EX);
}




file_put_contents("posts.json", json_encode($obj));

?>