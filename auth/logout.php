<?php
setcookie("user", "", time()-900, "/");
echo "Redirecting...";
if (@$_GET['fromPost']) {
    echo "<script>window.location.href=\"/post/?msg=Logged Out!\"</script>";
} else {
    echo "<script>window.location.href=\"/home.php?msg=Logged Out!\"</script>";
}
?>