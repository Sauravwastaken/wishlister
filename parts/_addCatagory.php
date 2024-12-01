<?php

include_once '_dbconnect.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $catagoryName = $_POST['add-catagory-name'];
    $userId = $_SESSION['userId'];

    // Checking if product already exists
    $loweredCatagoryName = strtolower($catagoryName);
    $sql = "SELECT * FROM `catagories` WHERE `catagory_user_id` = '$userId'";
    $result = mysqli_query($connect, $sql);

    while ($row = mysqli_fetch_assoc($result)) {
        if (strtolower($row['catagory_name']) == $loweredCatagoryName) {
            $alreadyExists = true;
            header('Location: ../index.php?errorMsg=Catagory already exists&catagoryName=' . $catagoryName);
            exit;
        }
    }


    $sql = "INSERT INTO `catagories` (`catagory_id`, `catagory_name`, `catagory_user_id`) VALUES (NULL, '$catagoryName', '$userId'); ";
    $result = mysqli_query($connect, $sql);
}

header('Location: ../index.php');
?>