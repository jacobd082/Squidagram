<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Deletion - Squidagram</title>
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
        <h1>Data Deletion</h1>
    </main>
    <main>
        <p>At Squidagram, we do not store much data about you personally. If you would like to delete a post, contact us via <a href="https://www.instagram.com/squidagramofficial">Instagram<a>.</p>
    </main>

</body>
</html>