<?php

include_once('_dbconnect.php');
$method = $_SERVER['REQUEST_METHOD'];
if($method == "POST") {

    $username = $_POST['login-username'];
    $password = $_POST['login-password'];



    $sql = "SELECT * FROM `users` WHERE `user_name` = '$username'";
    $result = mysqli_query($connect, $sql);

    $num = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);

    if($num > 0) {

        if(password_verify($password, $row['user_password'])) {

            $_SESSION['userId'] = $row['user_id'];
            $_SESSION['username'] = $row['user_name'];
            $_SESSION['loggedIn'] = true;

            header('Location: ../index.php');
            exit();
        } else {
            $errorMsg = "Password did not match";
        }
    } else {
        $errorMsg = "Username not found";
    }

    header("Location: ../login.php?errorMsg=".$errorMsg."&username=".$username);
}
