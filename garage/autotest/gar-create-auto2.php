<?php
session_start();

include("../gar-connect.php");
include("../functions.php");


$user_data = check_login($con);

check_right($con, 'cre');
error_reporting(0);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>gar-create-auto2</title>
    <link rel="stylesheet" href="../css/main.css">
</head>
<body>
<?php require_once "../header.php"; ?>
<div class="autoStandaard">
    <h1>Status</h1>
    <div>
        <?php
        //autogegevens uit het formulier halen
        $kenteken = $_POST['kentekenvak'];
        $automerk = $_POST['automerkvak'];
        $autotype = $_POST['autotypevak'];
        $autokmafstand = $_POST['autokmafstandvak'];
        $klantid = $_POST['klantidvak'];
        $validation = false;
        //autogegevens invoeren in de tabel
        require_once '../gar-connect.php';
        $autos = $conn->prepare("
                                    select kenteken,
                                           automerk,
                                           autotype,
                                           autokmafstand,
                                           klantid,
                                           foto
                                    from auto
                                    where kenteken = :kenteken");

        $autos->execute(["kenteken" => $kenteken]);

        foreach ($autos as $car) {
            $confirm = $car["kenteken"];
        }
        if ($confirm) {
            echo "Kenteken is al geregistreerd!";
        } else {

            $sql = $conn->prepare("INSERT INTO auto (kenteken,automerk,autotype,autokmafstand,klantid) VALUES (:kenteken,:automerk,:autotype,:autokmafstand,:klantid)");
            $sql->bindParam(":kenteken", $kenteken);
            $sql->bindParam(":automerk", $automerk);
            $sql->bindParam(":autotype", $autotype);
            $sql->bindParam(":autokmafstand", $autokmafstand);
            $sql->bindParam(":klantid", $klantid);
            $sql->execute();

            $validation = true;
        }

        if (!$confirm) {

            $autoNummer = lastCar($con);

            if (isset($_POST['submit']) && $validation === true) {
                $image = $_FILES['image'];
                $imageName = $_FILES['image']['name'];
                $imageTmpName = $_FILES['image']['tmp_name'];
                $imageSize = $_FILES['image']['size'];
                $imageError = $_FILES['image']['error'];
                $imageType = $_FILES['image']['type'];


                $imageExt = explode('.', $imageName);
                $imageNewExt = strtolower(end($imageExt));

                $allowedExt = array('jpg', 'jpeg', 'png');

                if (in_array($imageNewExt, $allowedExt)) {
                    if ($imageError === 0) {
                        if ($imageSize < 50000000) {
                            $imageNewName = $autoNummer["autoid"] . "autopicture" . "." . "$imageNewExt";
                            $imageDestination = 'autofotos/' . $imageNewName;

                            move_uploaded_file($imageTmpName, $imageDestination);

                        } else {
                            echo "File to big!";

                        }


                    } else {
                        echo "Er was een error!";
                    }
                } else {
                    echo "<br>Er is geen foto toegevoegd want dit bestand is niet supported! <br>";
                }
            }

        }
        $fotoQuery = $autoNummer["autoid"];

        $sql = $conn->prepare
        ("                           update auto
                                    set    foto =:foto
                                    where  autoid = '$fotoQuery'");
        if ($imageNewName) {
            $sql->execute
            ([
                "foto" => $imageNewName,
            ]);
        } else {
            $sql->execute
            ([
                "foto" => "standaard.jpg",
            ]);
        }

        if (!$confirm) {
            echo "<br>De auto is toegevoegd <br>";
            echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu </a></div>";
        } else {
            echo "<br> <b>De auto kon niet toegevoegd worden want dit kenteken is al geregistreerd!</b><br>";
            echo "<div class='backMenu'><a href='../gar-menu.php'>Terug naar het menu </a></div>";
        }


        ?></div>
</div>
</body>
</html>
