<?php

include_once '_dbconnect.php';


$method = $_SERVER['REQUEST_METHOD'];
if ($method == "POST") {
    $catId = $_POST['catId'];
    $productId = $_POST['edit-product-id'];
    $productName = $_POST['edit-product-name'];
    $productPrice = $_POST['edit-product-price'];
    $productLink = $_POST['edit-product-link'];
    $productCatagoryId = $_POST['edit-product-catagory'];

    if(!$productLink || !trim($productLink)) {
        $productLink = 0;
    }

    $sql = "UPDATE `products` SET `product_name` = '$productName', `product_catagory_id` = '$productCatagoryId', `product_price` = '$productPrice', `product_link` = '$productLink' WHERE `products`.`product_id` = $productId";
    $result = mysqli_query($connect, $sql);
    // if (!$result) {

    //     echo mysqli_error($connect);
    //     exit();
    // }
    if ($catId) {
        header('Location: ../index.php?catId=' . $catId);
    } else {
        header('Location: ../index.php');
    }
}