<?php
// Log this
$toBeLogged = "\n\nNOTE @ ".date('l jS \of F Y h:i:s A')."\n".$_POST['msg'];
file_put_contents('../data/log.txt', $toBeLogged, FILE_APPEND | LOCK_EX);
?>