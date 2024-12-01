<?php
$userId = $_SESSION['userId'];
include_once './parts/_functions.php';
?>

<section class="hero-container">
    <div class="hero-header">
        <p>Dashboard</p>
        <a id="addProductBtn">
            <i data-feather="plus" stroke-width="1.6"></i>
            <p>
                Add Products

            </p>
        </a>
    </div>
</section>

<section class='data-table-container'>

    <div class='data-table-head-container data-table-row'>
        <div class='data-table-head'>
            <div>Name</div>
            <div>Catagory</div>
            <div>Price</div>
            <div>Actions</div>
        </div>

    </div>

    <div class='data-table-body-container '>
        <?php
        if (isset($_GET['catId'])) {

            $catId = $_GET['catId'];
            $sql = "SELECT * FROM `products` WHERE `product_catagory_id` = $catId AND `product_user_id` = '$userId' ORDER BY `product_id` DESC";
            // echo var_dump( $sql );
        } else {
            $sql = "select * from `products` WHERE `product_user_id` = $userId ORDER BY `product_id` DESC";
        }

        $result = mysqli_query($connect, $sql);
        $num = mysqli_num_rows($result);
        $totalPrice = 0;

        while ($row = mysqli_fetch_assoc($result)) {
            $productId = $row['product_id'];
            $productName = $row['product_name'];
            $productPrice = $row['product_price'];
            $totalPrice += $productPrice;
            $productLink = $row['product_link'];

            $productName = productNameLinkValidate($productName, $productLink);

            $productCatagoryId = $row['product_catagory_id'];

            $sql2 = "select * from `catagories` where `catagory_id` = '$productCatagoryId'";
            $result2 = mysqli_query($connect, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $productCatagory = $row2['catagory_name'];
            ?>

        <div class='data-table-body data-table-row'>

            <div id="<?php echo $productId ?>">
                <img src='assets/images/product.png' width='30px' height='30px' alt=''>

                <?php echo $productName; ?>
            </div>
            <div id="productCatagoryId-<?php echo $productCatagoryId; ?>"><?php echo $productCatagory ?>
            </div>
            <div><?php echo '₹' . $productPrice; ?></div>
            <div class='data-table-actions-container'>
                <div class="data-table-edit">
                    <i id="productEditId-<?php echo $productId ?>" data-feather='edit-2' stroke-width='1.6'></i>
                </div>


                <div id="productDeleteId-<?php echo $productId ?>" class='data-table-delete'>
                    <i data-feather='trash' stroke-width='1.4'></i>
                </div>
            </div>
        </div>
        <?php } ?>

    </div>

    <div class='data-table-footer-container data-table-row'>


        <div class='data-table-footer '>
            <div class="flex justify-center">

                <?php
                if ($num == 0) {
                    echo "No results found";
                } else {
                    echo 'Total ₹' . $totalPrice;
                }
                ?>


            </div>
        </div>


        <!-- <div class='data-table-footer'>
                <p></p>
                <p class='justify-end'>Total</p>
                <p>
                 
                </p>
                <p></p>
            </div> -->

    </div>

</section>