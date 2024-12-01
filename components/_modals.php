<?php

$isCatPage = isset($_GET['catId']);
if ($isCatPage) {
    $catId = '?catId=' . $_GET['catId'];
} else {
    $catId = null;
}
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
    $userId = $_SESSION['userId'];
}

?>

<div class="add-product-container product-modal <?php if ((isset($_GET['errorMsg'])) && isset($_GET['productName'])) {
    echo 'showModal';
} ?>" id="addProductContainer">

    <div class="modal-header flex justify-between items-center">
        <p>Add product</p>
        <div id="closeModal" class="modal-header-action">
            <i data-feather="x"></i>
        </div>
    </div>
    <form action="parts/_addProduct.php<?php echo $catId; ?>" method="post" class="modal-body">
        <input type="text" class="hidden" id="catId" name="catId" value="<?php if (isset($_GET['catId'])) {
            echo $_GET['catId'];
        } ?>">
        <div class="flex flex-col">
            <label for="add-product-name">Name</label>
            <input type="text" name="add-product-name" id="add-product-name" value="<?php if (isset($_GET['productName'])) {
                echo $_GET['productName'];
            } ?>" required />
        </div>
        <div class="flex justify-between has-two-input">
            <div class="flex flex-col flex-1">
                <label for="add-product-price">Price</label>
                <input type="number" name="add-product-price" id="add-product-price" min="0" value="<?php if (isset($_GET['productPrice'])) {
                    echo $_GET['productPrice'];
                } ?>" required />
            </div>
            <div class="flex flex-col flex-1">
                <label for="add-product-name">Catagory</label>
                <select name="add-product-catagory" id="add-product-catagory" required>

                    <?php if (!$isIndex) { ?>

                        <option value="" hidden selected>Select</option>
                    <?php } ?>

                    <?php

                    $sql = "select * from `catagories` where `catagory_user_id` = '$userId'";
                    $result = mysqli_query($connect, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $catagoryId = $row['catagory_id'];
                        $catagoryName = $row['catagory_name'];

                        if ($_GET['catId'] == $catagoryId) {
                            $selectSameOption = true;
                        } else {
                            $selectSameOption = false;
                        }
                        ?>
                        <option value=" <?php echo $catagoryId ?>" <?php if ($selectSameOption) {
                               echo 'selected';
                           } ?>>
                            <?php echo $catagoryName; ?>
                        </option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div class="flex flex-col">
            <label for="add-product-link">Link</label>
            <input type="text" name="add-product-link" id="add-product-link" value="<?php if (isset($_GET['productLink'])) {
                echo $_GET['productLink'];
            } ?>" />
        </div>


        <button type="submit">Add Product</button>

        <?php
        if ((isset($_GET['errorMsg'])) && isset($_GET['productName'])) {
            echo '<p class="text-red text-xs login-system-error">' . $_GET['errorMsg'] . '</p>';
        } ?>
    </form>
</div>

<div class="add-product-container product-modal <?php if ((isset($_GET['errorMsg'])) && isset($_GET['catagoryName'])) {
    echo 'showModal';
} ?>" id="addCatagoryContainer">
    <div class="modal-header flex justify-between items-center">
        <p>Add Catagory</p>
        <div id="closeCatagoryModal" class="modal-header-action">
            <i data-feather="x"></i>
        </div>

    </div>
    <form action="parts/_addCatagory.php" method="post" class="modal-body">
        <div class="flex flex-col">
            <input type="text" name="add-catagory-name" id="add-catagory-name" required />
        </div>

        <button type="submit">Add Catagory</button>
        <?php
        if ((isset($_GET['errorMsg'])) && isset($_GET['catagoryName'])) {
            echo '<p class="text-red text-xs login-system-error">' . $_GET['errorMsg'] . '</p>';
        } ?>
    </form>
</div>

<div class="edit-product-container product-modal" id="editProductContainer">
    <div class="modal-header flex justify-between items-center">
        <p>Edit product</p>
        <div id="closeEditProductModal" class="modal-header-action">
            <i data-feather="x"></i>
        </div>
    </div>
    <form action="parts/_editProduct.php<?php echo $catId; ?>" method="post" class="modal-body">
        <input type="text" class="hidden" id="edit-product-id" name="edit-product-id">
        <input type="text" class="hidden" id="catId" name="catId" value="<?php if (isset($_GET['catId'])) {
            echo $_GET['catId'];
        } ?>">
        <div class="flex flex-col">
            <label for="edit-product-name">Name</label>
            <input type="text" name="edit-product-name" id="edit-product-name" required />
        </div>
        <div class="flex justify-between has-two-input">
            <div class="flex flex-col flex-1">
                <label for="edit-product-price">Price</label>
                <input type="number" name="edit-product-price" id="edit-product-price" min="0" required />
            </div>
            <div class="flex flex-col flex-1">
                <label for="edit-product-name">Catagory</label>
                <select name="edit-product-catagory" id="edit-product-catagory" required>

                    <?php if (!$isIndex) { ?>

                        <option value="" hidden selected>Select</option>
                    <?php } ?>

                    <?php

                    $sql = "select * from `catagories` where `catagory_user_id` = '$userId'";
                    $result = mysqli_query($connect, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        $catagoryId = $row['catagory_id'];
                        $catagoryName = $row['catagory_name'];

                        if (isset($_GET['catId'])) {
                            if ($_GET['catId'] == $catagoryId) {
                                $selectSameOption = true;
                            } else {
                                $selectSameOption = false;
                            }
                        }

                        ?>
                        <option value="<?php echo $catagoryId ?>" <?php if ($selectSameOption) {
                               echo 'selected';
                           } ?>>
                            <?php echo $catagoryName; ?>
                        </option>
                    <?php } ?>

                </select>
            </div>
        </div>
        <div class="flex flex-col">
            <label for="edit-product-link">Link</label>
            <input type="text" name="edit-product-link" id="edit-product-link" value="<?php if (isset($_GET['productLink'])) {
                echo $_GET['productLink'];
            } ?>" />
        </div>
        <button type="submit">Update</button>
    </form>
</div>


<div class="delete-product-container product-modal" id="deleteProductContainer">
    <div class="modal-header flex justify-center items-center">
        <p>Are you sure ?</p>
        <!-- <i id="closeDeleteProductModal" class="cursor-pointer" data-feather="x"></i> -->
    </div>
    <form action="parts/_deleteProduct.php<?php
    if (isset($_GET['catId'])) {
        echo '?catId=' . $_GET['catId'];
    } ?>" method="post" class="modal-body delete-product-modal-body">
        <div class="flex flex-col">
            <input class="hidden" type="number" name="delete-product-id" id="delete-product-id" required />

        </div>
        <div class="flex justify-center delete-product-btn-container">
            <button class="delete-product-primary-btn" type="submit">Yes</button>
            <button id="closeDeleteProductModal" class="delete-product-secondary-btn" type="button">No</button>
        </div>


    </form>
</div>