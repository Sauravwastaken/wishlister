<?php
include_once '_dbconnect.php';


$deleteProductId = $_POST['delete-product-id'];
$sql = "DELETE FROM products WHERE `products`.`product_id` = $deleteProductId";
$query = mysqli_query($connect, $sql);

if (isset($_GET['catId'])) {
    $catId = $_GET['catId'];
    header('Location: ../index.php?catId=' . $catId);
} else {
    header('Location: ../index.php');

}


?>