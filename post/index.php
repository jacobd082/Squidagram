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
    <?php
    //header('Content-Security-Policy-Report-Only: script-src https://accounts.google.com/gsi/client; frame-src https://accounts.google.com/gsi/; connect-src https://accounts.google.com/gsi/;');
    ?>
</head>
<script src="https://accounts.google.com/gsi/client" async defer></script>
  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-93Q3KS0HH5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-93Q3KS0HH5');
</script>
<body>
<?php echo file_get_contents('../ui/header.htm') ?>
    <center><form action="/data/upload.php" method="post" enctype="multipart/form-data">
        <?php
if (isset($_COOKIE['user'])) {
  echo '<main>
                    <h1>Post</h1>
                    Image File:<br><input type="file" placeholder="No File" required name="fileToUpload" id="fileToUpload"><br><br>
                    Description: <br><textarea type="text" maxlength="200" placeholder="This will be shown bellow your post. (max 200 chars.)" required name="des" id="des" oninput="onInput()" autocomplete="off" style="width: 266px; height: 87px;"></textarea><br><br><div class="g-recaptcha" data-sitekey="6LfB4ckfAAAAAJH3qOotGiFW1Munvvy_o9hC_8AU"></div><p>Make sure that you understand <a href="/help/rules.php?showBack=1">our rules</a> before posting.</p>
                    <button type="submit" class="bold-link">Share</button>
                    <button type="reset" class="red-link">Reset</button><br><br>
                    
        </main>';
} else {
  echo '<main><p>Please login to post!</p></main>';
}
        ?>
        <main>
        <?php
            if (isset($_COOKIE['user'])) {
                echo '<p>Logged in as <b>'.$_COOKIE['user'].'</b><br>This will be shown publicly on your post.<br><a href="/auth/logout.php?fromPost=1">Logout</a></p>';
            } else {
                echo '<div id="g_id_onload"
                data-client_id="817915936513-r81t57nc8s0dfe1pun598s61m1d1csp6.apps.googleusercontent.com"
                data-context="signup"
                data-ux_mode="popup"
                data-login_uri="https://squidagram.jacobdrath.co/auth/google.php"
                data-auto_prompt="false">
           </div>
           
           <div class="g_id_signin"
                data-type="standard"
                data-shape="pill"
                data-theme="outline"
                data-text="signinwithgoogle"
                data-size="large"
                data-logo_alignment="left">
           </div>';
            }
        ?>
        </main>
        </form></center>
    <script>
        function onInput() {
            input = document.getElementById("des")
            input.value = input.value.replaceAll("<","")
            input.value = input.value.replaceAll(">","")
        }
    </script>
</body>
</html>