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
$target_dir = "images/";
function generateRandomString($length = 10) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[random_int(0, $charactersLength - 1)];
  }
  return $randomString;
}
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$fileName = generateRandomString() . "." . $imageFileType;
$target_file = $target_dir . $fileName;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Sorry, file already exists. Please rename your file and try again.<br><br>";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 800000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" && $imageFileType != "webp" ) {
  echo "Sorry, only JPG, JPEG, WEBP, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

//The url you wish to send the POST request to
$url = 'https://www.google.com/recaptcha/api/siteverify';

//The data you want to send via POST
$fields = [
    'response'      => $_POST['g-recaptcha-response'],
    'secret' => '6LfB4ckfAAAAANmItrzwta9-6SODkowTsoqGpPSo'
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
    $manage = json_decode($result);
    if ($manage->success) {
      $uploadOk = 1;
    } else {
      $uploadOk = 0;
      echo "Human Verification Failed!";
    }
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "<h1>Posted!</h1>";
    $json = file_get_contents('posts.json');
    $obj = json_decode($json);
    $newData['user'] = "squid-" . generateRandomString(6);
    $newData['img'] = $fileName;
    $newData['description'] = $_POST['des'];
    array_push($obj->posts, $newData);
    file_put_contents("posts.json", json_encode($obj));
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
        </main>
    </center>
</body>
</html>