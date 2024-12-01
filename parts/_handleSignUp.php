<?php

include_once('_dbconnect.php');
$method = $_SERVER['REQUEST_METHOD'];
if($method == "POST") {

    $username = $_POST['signup-username'];
    $password = $_POST['signup-password'];
    $Cpassword = $_POST['signup-cpassword'];

    if($password == $Cpassword) {

        $sql = "SELECT * FROM `users` WHERE `user_name` = '$username'";
        $result = mysqli_query($connect, $sql);

        $num = mysqli_num_rows($result);


        if($num < 1) {

            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $sql = "INSERT INTO `users` (`user_name`, `user_password`) VALUES ( '$username', '$hashedPassword')";
            $result = mysqli_query($connect, $sql);

            if($result) {
                header("Location: ../login.php?username=".$username);
                exit();
            }
        } else {
            $errorMsg = "Username alrady exists";

        }

    } else {
        $errorMsg = "Password did not match";
    }

    header("Location: ../signup.php?errorMsg=".$errorMsg."&username=".$username);


}