<?php
session_start();

include("gar-connect.php");
include("functions.php");


$user_data = check_login($con);
error_reporting(0);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mijn Profiel</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require_once "header.php";
$pfp = $user_data['pfp']; ?>
<div class="profilePage">

    <h1>Profile</h1>
    <div class="imageProfile"><?php echo "<img src='userfotos/$pfp' alt='Profile Picture'>"?>

    </div>
    <div class="formPfp"> <form action="pfpchange.php" method="post" enctype="multipart/form-data">
            <input type="file" name="image" id="image" required>
            <input type="submit" name="submit">
        </form></div>

    <div>
        <h2>Name: <?php echo $user_data['username'];?></h2>
        <h2>Title: <?php echo $user_data['title'];?></h2>

        <a href="profiel-aanpassen.php">Profiel Veranderen</a>

    </div>


</div>

</body>
</html>