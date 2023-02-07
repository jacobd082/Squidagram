<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Rules - Squidagram</title>
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
        <h1>Our Rules</h1>
        <p>These rules tell you what you are allowed to post on Squidagram.</p>
        <p>A squid swimming in the sea:<br><b style="color: rgb(0, 165, 0);">Allowed</b></p>
        <p>An appropriate drawing of a squid:<br><b style="color: rgb(0, 165, 0);">Allowed</b></p>
        <p>Anything that is not a squid:<br><b style="color: red;">Not allowed</b></p>
        <p>An octopus:<br><b style="color: red;">Not allowed</b></p>
        <p>Squids participating in mating or reproductive behavior:<br><b style="color: red;">Not allowed</b></p>
        <p>A squid outside of water:<br><b style="color: red;">Not allowed</b></p>
        <p>A deceased squid:<br><b style="color: red;">Not allowed</b></p>
        <p>A squid with a political affiliation:<br><b style="color: red;">Not allowed</b></p>
        <p>Anything else:<br><b style="color: red;">Not allowed</b></p>
    </main>
    </center>
</body>
</html>