<?php
//gar-connect.php
//Maakt een connectie met de database 'garage'


$servername = "localhost";
$dbname = "garage";
$username = "root";
$password = "";


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "connectie gelukt";
}catch (PDOException $e){
    echo "Connectie mislukt: " . $e->getMessage();
}
try {
    $con = mysqli_connect($servername, $username, $password,$dbname);

}catch (PDOException $e){
    echo "Connectie mislukt: " . $e->getMessage();
}

