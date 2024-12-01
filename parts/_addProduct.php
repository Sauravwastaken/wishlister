<?php

include_once '_dbconnect.php';
include_once '_functions.php';

$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {

    $alreadyExists = false;


    $catId = $_POST['catId'];
    $productName = $_POST['add-product-name'];
    $productPrice = $_POST['add-product-price'];
    $productLink = $_POST['add-product-link'];
    if (!$productLink) {
        $productLink = 0;
    }
    $productCatagoryId = $_POST['add-product-catagory'];
    $userId = $_SESSION['userId'];


    // Checking if product already exists
    $loweredProductName = strtolower($productName);
    $sql = "SELECT * FROM `products` WHERE `product_user_id` = '$userId'";
    $result = mysqli_query($connect, $sql);
   
    while ($row = mysqli_fetch_assoc($result)) {
        if (strtolower($row['product_name']) == $loweredProductName) {
            $alreadyExists = true;
            header('Location: ../index.php?errorMsg=Product already exists&productName=' . $productName . '&productPrice=' . $productPrice);
            exit;

        }
    }
    $sql = "INSERT INTO `products` ( `product_name`, `product_catagory_id`, `product_price`, `product_link`, `product_user_id`) VALUES ('$productName', '$productCatagoryId', '$productPrice', '$productLink', '$userId')";
    $result = mysqli_query($connect, $sql);
    
}
if ($catId) {
    header('Location: ../index.php?catId=' . $catId);
} else {
    header('Location: ../index.php');
}
