<?php
setcookie("user", $_POST['user'], time()+(30*86400), "/");
echo "Redirecting...";
echo "<script>window.location.href=\"/home.php?msg=Welcome,%20".ucfirst($_POST['user'])."!\"</script>";
// Log this
$toBeLogged = "\n\nUSERNAME SET @ ".date('l jS \of F Y h:i:s A')."\nA new user logged in and set there username to <<".$_POST['user'].">>.";
file_put_contents('log.txt', $toBeLogged, FILE_APPEND | LOCK_EX);
?>