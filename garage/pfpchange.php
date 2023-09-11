<?php
session_start();

include("gar-connect.php");
include("functions.php");


$user_data = check_login($con);

$userQuery = $user_data['username'];
if (isset($_POST['submit'])) {
    $image = $_FILES['image'];
    $imageName = $_FILES['image']['name'];
    $imageTmpName = $_FILES['image']['tmp_name'];
    $imageSize = $_FILES['image']['size'];
    $imageError = $_FILES['image']['error'];
    $imageType = $_FILES['image']['type'];


    $imageExt = explode('.', $imageName);
    $imageNewExt = strtolower(end($imageExt));

    $allowedExt = array('jpg', 'jpeg', 'png', 'gif');

    if (in_array($imageNewExt, $allowedExt)) {
        if ($imageError === 0) {
            if ($imageSize < 50000000) {
                $imageNewName = $userQuery. "profilepicture"."."."$imageNewExt";
                $imageDestination = 'userfotos/'.$imageNewName;

                move_uploaded_file($imageTmpName, $imageDestination);

            }else{
                echo "File to big!";

            }


        } else {
            echo "Er was een error!";
        }
    } else {
        echo "Dit bestand is niet supported!";
    }
}
error_reporting(E_ALL ^ E_WARNING);

$sql = $conn->prepare
("                           update users
                                    set    pfp = :pfp
                                         
                           
                                    where  username = :username");
$sql->execute
([
    "pfp"         => $imageNewName,
    "username"       => $userQuery

]);

header("Location: myprofile.php");