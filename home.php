<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squidagram</title>
    <link rel="icon" href="/squid.png">
    <link rel="stylesheet" href="/base.css">
</head>
<body>
<header>
        <div style="display: table;width: 97vw;margin: 0;">
            <span style="font-family: 'Pacifico', cursive; font-size: 20px;" style="text-align: left;display: table-cell;">Squidagram
            <?php
                            if (@$_POST['admin']=="jacobisme") {
                                echo "<span style=\"color: blue;\">Administrator</span>";
                            }
            ?>
            </span>
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
    <div style="margin-left: 15px;">
    <!--<main>
        <h1>Welcome to Squidagram!</h1>
        <p>This is the homepage, where you will see all the posts by others on Squidagram.</p>
    </main>-->
    <p style="color:gray;">Recommended Posts:</p>
    <?php
        $json = file_get_contents('data/posts.json');
        $obj = json_decode($json);
        foreach ($obj->posts as $key => $value) {
            echo "<main><span>@";
            if ($value->user=="squidagram") {
                echo '<span class="tooltip">squidagram<img src="/icons/verified.png" height="14px"><span class="tooltiptext">Verified Account</span></span>';
                //echo "<img src=\"/icons/verified.png\" height=\"14px\" title=\"Official Account\">";
            } else {
                echo '<span class="tooltip">';
                echo $value->user;
                echo '<span class="tooltiptext">Unknown User</span></span>';
            }
            echo "</span>";
            echo "<img src=\"data/images/";
            echo $value->img;
            echo "\" style=\"width:100%;padding-top: 10px;border-radius:5px;\" loading=\"lazy\">";
            echo "<p>";
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