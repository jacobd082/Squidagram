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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
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
<header>
        <div style="display: table;width: 97vw;margin: 0;">
            <a href="#" id="logo" style="font-family: 'Pacifico', cursive; font-size: 20px; color: black; text-decoration: none;" style="text-align: left;display: table-cell;">Squidagram
            <?php
                            if (@$_POST['admin']=="jacobisme") {
                                echo "<span style=\"color: blue;\">Administrator</span>";
                            }
            ?>
            </a>
            </span>
            <p style="text-align: right;display: table-cell;\">
                <a href="/home.php" title="Home"><img class="linkimg" src="/icons/home.png"></a>
                &nbsp;
                <a href="/post/" title="Post"><img class="linkimg" src="/icons/post.png"></a>
                &nbsp;
                <a href="/" title="Logout"><img class="linkimg" src="/icons/logout.png"></a>
            </p>
        </div>
    </header>
    <div style="height: 50px;"></div>
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
function setColorScheme(id, showToast = true) {
    if (id=="dark") {
        $('body').css('background', 'black')
        $('body').css('color', 'white')
        $('main').css('background', '#2e2e2e')
        $('#q').css('background', '#2e2e2e')
        $('header').css('background', '#2e2e2e')
        $('header').css('filter', 'drop-shadow(0px 2px 5px black)')
        $('#logo').css('color', 'white')
        $('.linkimg').css('filter', 'invert(1)')
        $('#squidagramofficial').css('color', 'white')
        $('#squidagramofficial').css('border-color', 'black')
        $('a').css('color', 'white')
        if (showToast) {
            toast('Set to dark theme!')
        }
        localStorage.setItem('color','dark')
        $('#mdmpa').css('display', 'none')
    }
    else
    if (id== "light") {
        $('body').css('background', '#CCCCCC')
        $('body').css('color', 'black')
        $('main').css('background', 'white')
        $('#q').css('background', 'white')
        $('header').css('background', 'white')
        $('header').css('filter', 'drop-shadow(0px 2px 5px gray)')
        $('.linkimg').css('filter', 'invert(0)')
        $('#squidagramofficial').css('color', 'black')
        $('#squidagramofficial').css('border-color', 'rgb(211, 211, 211)')
        $('a').css('color', 'blue')
        $('#logo').css('color', 'black')
        $('#order').css('color', 'gray')
        if (showToast) {
            toast('Set to light theme!')
        }
        localStorage.setItem('color', 'light')
        $('#mdmpa').css('display', 'block')
    }
}
window.onload = function () {
    if (localStorage.getItem('color')=='dark') {
        setTimeout(() => { setColorScheme('dark', false); $('#color').val("dark");}, 0)
    }
}
function toggleTheme() {
    if (localStorage.getItem('color')=='dark') {
        setColorScheme('light')
    } else {
        setColorScheme('dark')
    }
}
    </script>
    <div style="display: table;width: 100%;margin: 0;vertical-align: middle;margin-left:8px;">
    <?php
            if (@$_GET['order']=="new") {
                echo "<p style=\"color:gray;margin-left: 15px;text-align: left;display: table-cell;padding:5px;\">Posts <a id=\"order\" style=\"color:gray;\" href=\"/home.php\">(Newer → Older)</a>:</p>";
            } else {
                echo "<p style=\"color:gray;margin-left: 15px;text-align: left;display: table-cell;padding:5px;\">Posts <a id=\"order\" style=\"color:gray;\" href=\"/home.php?order=new\">(Older → Newer)</a>:</p>";
            }
    ?>
    <span id="mobiledarkmode">
        <span onclick="toggleTheme()" style="display:relevant;top:8px;">
            <img id="mdmicon" src="icons/night-mode.png" style="filter: invert(0.5);">
        </span>
    </span>
    </div>
    <div style="display: flex;">
    <div style="margin-left: 15px;flex: 3;">
    <script>
        </script>
    <!--<main>
        <h1>Welcome to Squidagram!</h1>
        <p>This is the homepage, where you will see all the posts by others on Squidagram.</p>
    </main>-->
    <?php
                            if (@$_POST['admin']=="jacobisme") {
                                echo "<main><b>You are logged in as an admin.</b><br><a href=\"admin/update.php\">Update</a></main>";
                            }
    ?>
    <?php
        $json = file_get_contents('data/posts.json');
        $obj = json_decode($json);
        if (@$_GET['order']=="new") {
            $obj->posts = array_reverse($obj->posts);
        }
        foreach ($obj->posts as $key => $value) {
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
    ?>
    </div>
    <aside style="flex: 1;" id="sidebar">
        <main class="index">
            <center>
                <img src="squid.png" height="100">
                <p style="font-weight: bold;">Welcome to Squidagram!</p>
            </center>
        </main>
        <main class="index">
            <center>
                <p>Submit a post <a href="post/">here</a>!</p>
            </center>
        </main>
        <form action="/search.php" method="get">
            <input type="search" placeholder="Search Squidagram..." name="q" id="q" class="index" style="width: 100%;" oninput="onSearchInput()">
        </form>
        <script>
            function onSearchInput() {
                if ($('#q').val()!="") {
                    $('#searcontx').css('display', 'block')
                } else {
                    $('#searcontx').css('display', 'none')
                }
            }
        </script>
        <span id="searcontx" style="display:none;font-size: 10px;">Press <b>Enter</b> to search...</span>
        <main class="index">
            <p>View the official Squidagram account:
            <div><a href="profile.php?u=squidagram">
                <span class="tooltip"><span id="squidagramofficial" style="color: black;border-style: solid;border-color: rgb(211, 211, 211);border-radius: 5px;margin: 5px;border-width: 2px;">squidagram<img src="/icons/verified.png" height="14px"></span><span class="tooltiptext"><center><span style="width:14px;"></span><img src="squid.png" width="40"><img src="/icons/verified.png" height="14"><br><b>Squidagram</b><br>@squidagram<br><span style="color:#00caed;">Verified</span></center></span></span>
            </a></div>
            </p>
        </main>
      <main class="index">
                <p>There is currently:<br><span style="font-size:xx-large;"><b><?php echo count($obj->posts); ?></b> posts</span><br>on Squidagram</p>
      </main>
        <?php
            if (isset($_COOKIE['user'])) {
                echo '<main class="index">
                    <center>
                    <p>Logged in as <b>'.$_COOKIE['user'].'</b><br><a href="/auth/logout.php">Logout</a></p>
                    </center>
                    </main>';
            } else {
              echo '<br><div id="g_id_onload"
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
<ul>
  <li>Made by <a href="https://zzz.jacobdrath.co">Jacob Drath</a></li>
  <li><a href="help/privacy-policy.php">Privacy Policy</a></li>
  <li><a href="help/rules.php">Posting Guidelines</a></li>
  <li><a href="help/credits.php">Acknowledgments</a></li>
</ul>
<select id="color" title="Set a color scheme" oninput="setColorScheme(document.getElementById('color').value)">
    <option value="light">Light</option>
    <option value="dark">Dark</option>
</select>
        <p><span onclick="document.getElementById('sidebar').style.display='none'" style="color:gray;font-size: 10px;cursor: pointer;">Hide this</span></p>
    </aside>
    </div>
    <div id="snackbar"><table><tr><td><img src="/squid.png" width="40px"></td><td><span style="color:gray;font-size:10px;">Squiddy:</span><p id="snacktext" style="padding:0;margin:0;"></p></td></tr></table></div>
</body>
        <script>
<?php
    if (isset($_GET['msg'])) {
        echo "toast(\"".$_GET['msg']."\")";
    } else {
      if (isset($_COOKIE['user'])) {
        echo 'toast("Hi, '.ucfirst($_COOKIE['user']).'!")';
      }
    }
?>
</script>
</html>