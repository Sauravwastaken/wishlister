<?php
$showMoreNav = false;
$isCatId = isset($_GET['catId']);
$userId = $_SESSION['userId'];
?>

<section class="sidebar">
    <div class="site-title">
        <p>
            <a href="index.php"> Wishlister </a>
        </p>
    </div>
    <nav class="nav">
        <div class="nav-items-container">
            <div class="nav-item-parent <?php if (!$isCatId) {
                echo 'nav-item-active';
            } ?>">
                <a href="index.php" class="nav-item-parent nav-item flex justify-between items-center ">
                    <div class=" nav-item-main flex items-center">
                        <i data-feather="arrow-right" stroke-width="1.6"></i>
                        <p>All Products</p>
                    </div>

                </a>
                <!-- <div class="nav-more-container ">
                    <i data-feather="more-vertical"></i>
                </div> -->

            </div>



            <?php


            $sql = "SELECT * FROM `catagories` WHERE `catagory_user_id` = '$userId'";
            $result = mysqli_query($connect, $sql);

            $totalCatagoryCount = mysqli_num_rows($result);
            // echo $totalCatagoryCount;
            if ($totalCatagoryCount > 5) {
                $countBreak = 3;
            } else {
                $countBreak = $totalCatagoryCount;
            }
            $count = 0;


            while ($row = mysqli_fetch_assoc($result)) {
                $catagoryName = $row['catagory_name'];
                $catagoryId = $row['catagory_id'];

                $count++;
                $hasMoreNav = $count > $countBreak;
                if ($hasMoreNav) {
                    $showMoreNav = true;
                }

                if ($isCatId) {

                    if ($_GET['catId'] == $catagoryId) {
                        $showNavItemActive = 'nav-item-active';
                    } else {
                        $showNavItemActive = false;
                    }

                    // echo var_dump($_GET['catId']);
                    // echo var_dump($catagoryId);
                    // echo var_dump($showNavItemActive);
                }


                ?>

            <div class="nav-item-parent <?php if ($showNavItemActive) {
                    echo $showNavItemActive;
                } ?>">


                <a href="index.php?catId=<?php echo $catagoryId; ?>" class="nav-item flex justify-between items-center">
                    <div class="nav-item-main flex items-center">
                        <i data-feather="arrow-right" stroke-width="1.6"></i>
                        <p><?php echo $catagoryName; ?></p>
                    </div>
                </a>
                <!-- <div class="nav-more-container flex items-center">
                        <i data-feather="more-vertical"></i>
                    </div>
                    <div class="more-vertical-container" tabindex="0">
                        <div class="flex items-center">
                            <i data-feather="edit" width="20"></i>
                            <p class="mx-2">Rename</p>
                        </div>
                        <div class="flex items-center">
                            <i data-feather="delete" width="20"></i>
                            <p class="mx-2">Delete</p>
                        </div>
                    </div> -->

            </div>


            <?php if ($showMoreNav) { ?>
            <div class="nav-item-parent">
                <a class="nav-item flex justify-between items-center" id="navMore">
                    <div class="nav-item-main flex items-center ">
                        <i data-feather="chevrons-right" stroke-width="1.6"></i>
                        <p>More</p>
                    </div>
                </a>
                <!-- <div class="nav-more-container flex items-center">
                            <i data-feather="more-vertical"></i>
                        </div> -->

            </div>

            <div id="hiddenNav" class="nav-items-container hidden-nav">

                <?php
                        $sql = "SELECT * FROM `catagories` WHERE `catagory_user_id` = '$userId' limit 5 offset 4";
                        $result = mysqli_query($connect, $sql);

                        $totalCatagoryCount = mysqli_num_rows($result);


                        while ($row = mysqli_fetch_assoc($result)) {

                            $catagoryId = $row['catagory_id'];
                            $catagoryName = $row['catagory_name'];


                            if ($isCatId) {

                                if ($_GET['catId'] == $catagoryId) {
                                    $showNavItemActive = 'nav-item-active';
                                } else {
                                    $showNavItemActive = false;
                                }
                                // echo var_dump($_GET['catId']);
                                // echo var_dump($catagoryId);
                                // echo var_dump($showNavItemActive);
                            }


                            ?>
                <div class="nav-item-parent <?php if ($showNavItemActive) {
                                echo $showNavItemActive;
                            } ?>">


                    <a href="index.php?catId=<?php echo $catagoryId; ?>"
                        class="nav-item flex justify-between items-center" id="navMore">
                        <div class="nav-item-main flex items-center">
                            <i data-feather="chrome" stroke-width="1.6"></i>
                            <p><?php echo $catagoryName; ?></p>
                        </div>
                    </a>

                </div>
                <?php } ?>

            </div>
            <?php } ?>

            <?php
                if ($hasMoreNav) {
                    break;
                }
            }


            ?>

        </div>

    </nav>
</section>