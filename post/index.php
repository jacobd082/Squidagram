<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post - Squidagram</title>
    <link rel="icon" href="/squid.png">
    <link rel="stylesheet" href="/base.css">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <meta name="description" content="Squidagram is the #1 place on the internet for squids to connect. Join Now!">
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
    <center>
        <main>
            <?php 
                $allow_uploads = true;
                if ($allow_uploads) {
                    echo '<h1>Post</h1><form action="/data/upload.php" method="post" enctype="multipart/form-data">
                    Image File:<br><input type="file" placeholder="No File" required name="fileToUpload" id="fileToUpload"><br><br>
                    Description: <br><textarea type="text" maxlength="200" placeholder="This will be shown bellow your post. (max 200 chars.)" required name="des" id="des" oninput="onInput()" autocomplete="off" style="width: 266px; height: 87px;"></textarea><br><br><div class="g-recaptcha" data-sitekey="6LfB4ckfAAAAAJH3qOotGiFW1Munvvy_o9hC_8AU"></div><p>Make sure that you understand <a href="/help/rules.php?showBack=1">our rules</a> before posting.</p>
                    <button type="submit" class="bold-link">Share</button>
                    <button type="reset" class="red-link">Reset</button><br><br>
                    </form>';
                } else {
                    echo "<h1>Posting is currently disabled.</h1><p><b>Why is this?</b><br>In order to make sure that squidagram is safe, we are taking time to secure our system before allowing people to post</p>";
                }
            ?>
        </main>
    </center>
    <script>
        function onInput() {
            input = document.getElementById("des")
            input.value = input.value.replaceAll("<","")
            input.value = input.value.replaceAll(">","")
        }
    </script>
</body>
</html>