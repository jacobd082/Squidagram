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
    <center><form action="/data/upload.php" method="post" enctype="multipart/form-data">
        <main>
                    <h1>Post</h1>
                    Image File:<br><input type="file" placeholder="No File" required name="fileToUpload" id="fileToUpload"><br><br>
                    Description: <br><textarea type="text" maxlength="200" placeholder="This will be shown bellow your post. (max 200 chars.)" required name="des" id="des" oninput="onInput()" autocomplete="off" style="width: 266px; height: 87px;"></textarea><br><br><div class="g-recaptcha" data-sitekey="6LfB4ckfAAAAAJH3qOotGiFW1Munvvy_o9hC_8AU"></div><p>Make sure that you understand <a href="/help/rules.php?showBack=1">our rules</a> before posting.</p>
                    <button type="submit" class="bold-link">Share</button>
                    <button type="reset" class="red-link">Reset</button><br><br>
                    
        </main>
        <main>
        <?php
if (isset($_GET['code'])) {
    //The url you wish to send the POST request to
    $url = 'https://api.instagram.com/oauth/access_token';

    //The data you want to send via POST
    $fields = [
        'client_id' => '144702278511036',
        'client_secret' => '1740d4030e38fbfa8efeea4548e00a6d',
        'grant_type' => 'authorization_code',
        'redirect_uri' => 'https://squidagram.jacobdrath.co/post/index.php',
        'code' => $_GET['code']
    ];
    
    //url-ify the data for the POST
    $fields_string = http_build_query($fields);
    
    
    function isJson($string) {
        json_decode($string);
        return json_last_error() === JSON_ERROR_NONE;
     }
    
    //open connection
    $ch = curl_init();
    
    //set the url, number of POST vars, POST data
    curl_setopt($ch,CURLOPT_URL, $url);
    curl_setopt($ch,CURLOPT_POST, true);
    curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
    
    //So that curl_exec returns the contents of the cURL; rather than echoing it
    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 
    
    //execute post
    $result = curl_exec($ch);
    if (isJson($result)) {
        $result = json_decode($result);
    } else {
        echo "<h1>Error</h1>";
    }
    $user_data = json_decode(file_get_contents('https://graph.instagram.com/' . $result->user_id . '?fields=id,username&access_token=' . $result->access_token));
    
    echo '<p>Logged in with Instagram as <b>'.$user_data->username.'</b>. This username will be shown publicly with your post. <a href="/post/">Logout</a></p><div style="display:none;"><input name="token" id="token" type="text" value="'.$result->access_token.'"><input name="uid" id="uid" type="text" value="'.$result->user_id.'"></div>';
} else {
    echo "<p>Login with Instagram to use your username</p><a href=\"https://api.instagram.com/oauth/authorize?client_id=144702278511036&redirect_uri=https://squidagram.jacobdrath.co/post/index.php&scope=user_profile,user_media&response_type=code\" class=\"bold-link\">Login with Instagram</a><br><br>";
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