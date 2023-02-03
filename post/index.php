<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post - Squidagram</title>
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
                <a href="/"><img src="/icons/logout.png"></a>
            </p>
        </div>
    </header>
    <div style="height: 50px;"></div>
    <center>
        <main>
            <?php 
                $allow_uploads = false;
                if ($allow_uploads) {
                    echo '<h1>Submit a post</h1><form action="/data/upload.php" method="post" enctype="multipart/form-data">
                    Image File: <input type="file" placeholder="No File" required name="fileToUpload" id="fileToUpload"><br>
                    Description: <input type="text" maxlength="200" placeholder="max 200 chars." required name="des"><br><br>
                    <button type="submit" class="bold-link">Share</button>
                    <button type="reset" class="red-link">Reset</button>
                    </form>';
                } else {
                    echo "<h1>Posting is currently disabled.</h1><p><b>Why is this?</b><br>In order to make sure that squidogram is safe, we are taking time to secure our system before allowing people to post</p>";
                }
            ?>
        </main>
    </center>
</body>
</html>