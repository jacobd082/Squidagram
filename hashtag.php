<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>#<?php echo $_GET['id']; ?> - Squidagram</title>
    <link rel="icon" href="/squid.png">
    <link rel="stylesheet" href="/base.css">
</head>
<body>
    <header>
        <div style="display: table;width: 97vw;margin: 0;">
            <span style="font-family: 'Pacifico', cursive; font-size: 20px;" style="text-align: left;display: table-cell;">Squidagram</span>
            <p style="text-align: right;display: table-cell;\">
                <a href="/home.php" ><img src="/icons/home.png"></a>
                &nbsp;
                <a href="/post/" ><img src="/icons/post.png"></a>
                &nbsp;
                <a href="/"><img src="/icons/logout.png"></a>
            </p>
        </div>
    </header>
    <div style="height: 50px;"></div>
    <h1>#<?php echo $_GET['id']; ?></h1>
    <p style="color:gray;">#<?php echo $_GET['id']; ?>:</p>
    <?php
        $json = file_get_contents('data/posts.json');
        $obj = json_decode($json);
        $obj->posts = array_reverse($obj->posts);
        foreach ($obj->posts as $key => $value) {
                if (str_contains($value->description, '#'.$_GET['id'])) {
                    echo "<main><span style=\"padding-left:12px;display: flex;align-items: center;\">";
                    if ($value->user=="squidagram") {
                        echo '<img src="squid.png" height="25px">&nbsp;';
                        echo '<span class="tooltip">squidagram <img src="/icons/verified.png" height="14px"><span class="tooltiptext"><center><span style="width:14px;"></span><img src="squid.png" width="40"><img src="/icons/verified.png" height="14"><br><b>Squidagram</b><br>@squidagram<br><span style="color:#00caed;">Verified</span></center></span></span>';
                        //echo "<img src=\"/icons/verified.png\" height=\"14px\" title=\"Official Account\">";
                    } else if (substr( $value->user, 0, 6 ) === "squid-") {
                        echo '<span class="tooltip">';
                        echo $value->user;
                        echo '<span class="tooltiptext"><center><span style="width:14px;"></span><b>Unknown User</b><br>@' . $value->user . '</center></span></span>';
                    } else {
                        echo '<span class="tooltip">';
                        echo $value->user;
                        if (($value->user=="jacd082") || ($value->user=="squidagramofficial")) {
                            echo ' <img src="/icons/verified.png" height="14px">';
                        }
                        echo '<span class="tooltiptext"><center><span style="width:14px;"></span><b>@' . $value->user . '</b><br>Squidagram User</center></span></span>';
                    }
                    echo "</span>";
                    echo "<img src=\"data/images/";
                    echo $value->img;
                    echo "\" style=\"width:100%;padding-top: 10px;\" loading=\"lazy\" onerror=\"this.onerror=null; this.src='data/images/missing.png'\">";
                    echo "<p style=\"padding-left:12px;overflow-wrap: break-word;\">";
                    echo preg_replace('/(?<!\S)#([0-9a-zA-Z]+)/', '<a href="/hashtag.php?id=$1">#$1</a>', $value->description);
                    if (@$_POST['admin']=="jacobisme") {
                        echo " <a href=\"data/delete.php?postId=" . strval($key) . "&imageName=" . $value->img . "\">Delete</a>";
                    }
                    echo "</p>";
                    echo "</main>";
                }
        }
    ?>
</body>
</html>