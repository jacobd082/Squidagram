<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Squidagram</title>
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
    <center>
    <?php
    if (@$_GET['showBack']=="1") {
        echo "<main><a href=\"javascript:history.back()\">< Go Back</a></main>";
    }
    ?>
    <main>
        <h1>Credits & Acknowledgments</h1>
    </main>
    <main>
        <ul>
            <li>Jacob Drath - Owner, Programmer, Designer. <a href="https://zzz.jacobdrath.co">Website</a>, <a href="https://github.com/jacobd082">Github</a></li>
            <li><a href="https://www.flaticon.com/free-icons/squid" title="squid icons">Squid icons created by Freepik - Flaticon</a></li>
            <li>Written in <a href="https://www.php.net">PHP</a> and <a href="https://www.javascript.com">JavaScript</a></li>
        </ul>
    </main>

</body>
</html>