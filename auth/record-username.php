<?php
setcookie("user", $_POST['user'], time()+(30*86400), "/");
echo "Redirecting...";
echo "<script>window.location.href=\"/home.php?msg=Welcome,%20".ucfirst($_POST['user'])."!\"</script>";
?>