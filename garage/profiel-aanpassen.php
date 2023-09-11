<?php
session_start();

include ("gar-connect.php");
include("functions.php");


$user_data = check_login($con);

?>
<!doctype html>
<html lang="en">
<head>
    <meta name="author" content="Anjo Eijeriks">
    <meta charset="UTF-8">
    <title>gar-update-klant2.php</title>
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
<?php require_once "header.php"?>
<div class="klantStandaard">
<h1>Pas je profiel aan.</h1>
<p>
   Hier kan je je naam of wachtwoord aanpassen, mocht je andere rechten nodig hebben of willen moet u dit bespreken met uw admin.
</p><div class="formCreate">
<?php
// username uit het formulier halen
$username = $user_data['username'];
// gebruiker gegevens uit de tabel halen

$gegevens = $conn->prepare("     select  username,
                                              password,
                                              user_id
                                      from    users
                                      where   username = :username
                                    ");
$gegevens->execute(["username" => $username]);
// klantgegevens in en nieuw formulier laten zien
echo "<form action='profiel-aanpassen2.php' method='post'>";
foreach ($gegevens as $info) {
    $gebruikersnaam = $info['username'];
    $wachtwoord = $info['password'];
    $uid = $info['user_id'];

   echo "<label>Username: </label><input type='text' value='$gebruikersnaam' name='username' required><br>";
   echo "<label>Password: </label><input type='text' value='$wachtwoord' name='password' required><br>";
   echo "<input type='hidden' value='$uid' name='uid' required>";
}
echo "<input type='submit'>";
echo "</form>"; ?></div></div></body>
</html>

