<?php

echo "lol";

function check_login($con)
{

    if (isset($_SESSION['user_id'])) {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login
    header("Location: ../../garage/login.php");
    die;

}

function check_right($con, $right)
{

    if (isset($_SESSION['user_id'])) {

        $id = $_SESSION['user_id'];
        $query = "select * from users where user_id = '$id' limit 1";

        $result = mysqli_query($con, $query);
        if ($result && mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);
            if (!$user_data[$right] === true) {
                header("Location: ../index.php");
                die;
            }
        }
    }


}

function lastCar($con)
{
    $query = "SELECT * FROM auto  ORDER BY autoid DESC  LIMIT 1;  ";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0){
        $autoNummer = mysqli_fetch_assoc($result);
        return $autoNummer;
    }
}