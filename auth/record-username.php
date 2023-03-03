<?php
echo "Redirecting...";
setcookie("user", $_POST['user'], time()+(30*86400), "/");
echo "<script>window.location.href=\"/home.php?msg=Username Set!\"</script>";
?>