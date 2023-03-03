<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Squidagram</title>
    <link rel="icon" href="/squid.png">
    <link rel="stylesheet" href="/css/landing_page.css">
    <meta name="description" content="Squidagram is the #1 place on the internet for squids to connect. Join Now!">
    <link rel="manifest" href="/manifest.webmanifest">
    <meta name="theme-color" content="#FFFFFF">
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
    <main style="margin-left:8px;height: 100vh;">
        <p href="#" style="font-family: 'Pacifico', cursive; font-size: 20px; color: black; text-decoration: none;" style="text-align: left;display: table-cell;">Squidagram</p>
        <div style="height:10vh"></div>
        <?php
            //echo $_POST['credential'];
            require_once '../vendor/autoload.php';

            // Get $id_token via HTTPS POST.
            $CLIENT_ID = "817915936513-r81t57nc8s0dfe1pun598s61m1d1csp6.apps.googleusercontent.com";
            $client = new Google_Client(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
            $payload = $client->verifyIdToken($_POST['credential']);
            if ($payload) {
                $first_name = strtolower($payload['given_name']);
                $last_name = strtolower($payload['family_name']);
                echo "<h1>Hey, ".$payload['given_name']."!</h1>
                <div style=\"background:white;max-width:400px;border-radius:10px;padding:10px;\">
                <p>How would you like to be identified on Squidagram?</p>
                <form action=\"record-username.php\" method=\"post\">
                <select name=\"user\" id=\"user\" oninput=\"toast('Great Choice!')\">
                <option value=\"none\">Select An Option</option>
                <option value=\"".$first_name."\">@".$first_name."</option>
                <option value=\"".$last_name."\">@".$last_name."</option>
                <option value=\"".$first_name."-".$last_name."\">@".$first_name."-".$last_name."</option>
                <option value=\"".(explode("@", $payload['email'])[0])."\">@".(explode("@", $payload['email'])[0])."</option>
                </select>
                <p>Please not that your username is not individually yours, and that others can have the same username.</p>
                <p>This username will be used for 1 month before you have to reset it.</p>
                <button type=\"submit\">Submit</button>
                </form>
                </div>
                <p style=\"color:rgba(0,0,0,0.5);\">You have logged in with Google as <b>".$payload['email']."</b></p>";
            } else {
                echo "Error!";
            }
        ?>
        <div style="height:20px"></div>
        <div id="snackbar"><table><tr><td><img src="/squid.png" width="40px"></td><td><span style="color:gray;font-size:10px;">Squiddy:</span><p id="snacktext" style="padding:0;margin:0;"></p></td></tr></table></div>
        <script>
function toast(msg) {
  // Get the snackbar DIV
  var x = document.getElementById("snackbar");
  document.getElementById("snacktext").innerHTML = msg;

  // Add the "show" class to DIV
  x.className = "show";

  // After 3 seconds, remove the show class from DIV
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 5000);
}
            </script>
</body>
</html>