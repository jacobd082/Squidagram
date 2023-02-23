<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squidagram</title>
    <link rel="icon" href="/squid.png">
    <link rel="stylesheet" href="/base.css">
    <link rel="manifest" href="/manifest.webmanifest">
</head>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-93Q3KS0HH5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-93Q3KS0HH5');
</script>
<body>
<header>
        <div style="display: table;width: 97vw;margin: 0;">
            <a href="#" style="font-family: 'Pacifico', cursive; font-size: 20px; color: black; text-decoration: none;" style="text-align: left;display: table-cell;">Squidagram
            <?php
                            if (@$_POST['admin']=="jacobisme") {
                                echo "<span style=\"color: blue;\">Administrator</span>";
                            }
            ?>
            </a>
            </span>
            <p style="text-align: right;display: table-cell;\">
                <a href="/home.php" title="Home"><img src="/icons/home.png"></a>
                &nbsp;
                <a href="/post/" title="Post"><img src="/icons/post.png"></a>
                &nbsp;
                <a href="/" title="Logout"><img src="/icons/logout.png"></a>
            </p>
        </div>
    </header>
    <div style="height: 50px;"></div>
    <div style="margin-left: 15px;">
    <!--<main>
        <h1>Welcome to Squidagram!</h1>
        <p>This is the homepage, where you will see all the posts by others on Squidagram.</p>
    </main>-->
    <?php
        if (@$_GET['order']=="new") {
            echo "<p style=\"color:gray;\">Posts <a style=\"color:gray;\" href=\"/home.php\">(Newer → Older)</a>:</p>";
        } else {
            echo "<p style=\"color:gray;\">Posts <a style=\"color:gray;\" href=\"/home.php?order=new\">(Older → Newer)</a>:</p>";
        }
        $json = file_get_contents('data/posts.json');
        $obj = json_decode($json);
        if (@$_GET['order']=="new") {
            $obj->posts = array_reverse($obj->posts);
        }
        foreach ($obj->posts as $key => $value) {
            echo "<main><span style=\"padding-left:12px;display: flex;align-items: center;\">";
            if ($value->user=="squidagram") {
                echo '<img src="squid.png" height="25px">&nbsp;';
                echo '<span class="tooltip">squidagram<img src="/icons/verified.png" height="14px"><span class="tooltiptext"><center><span style="width:14px;"></span><img src="squid.png" width="40"><img src="/icons/verified.png" height="14"><br><b>Squidagram</b><br>@squidagram<br><span style="color:#00caed;">Verified</span></center></span></span>';
                //echo "<img src=\"/icons/verified.png\" height=\"14px\" title=\"Official Account\">";
            } else {
                echo '<span class="tooltip">';
                echo $value->user;
                echo '<span class="tooltiptext"><center><span style="width:14px;"></span><b>Unknown User</b><br>@' . $value->user . '</center></span></span>';
            }
            echo "</span>";
            echo "<img src=\"data/images/";
            echo $value->img;
            echo "\" style=\"width:100%;padding-top: 10px;\" loading=\"lazy\" onerror=\"this.onerror=null; this.src='data/images/missing.png'\">";
            echo "<p style=\"padding-left:12px;\">";
            echo $value->description;
            if (@$_POST['admin']=="jacobisme") {
                echo " <a href=\"data/delete.php?postId=" . strval($key) . "&imageName=" . $value->img . "\">Delete</a>";
            }
            echo "</p>";
            echo "</main>";
        }
    ?>
    </div>
</body>
<script>
    /*if (window.innerWidth<380) {
        document.body.innerText="Screen too small."
    }*/
</script>
</html>