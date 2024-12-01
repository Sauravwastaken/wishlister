<?php include_once 'components/_header.php';
if (!isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] != true) {
    header('location: login.php');
}
?>

<section class="container">

    <?php include_once 'components/_sidebar.php'; ?>
    <div class="main-site-area">

        <?php include_once 'components/_topbar.php'; ?>
        <?php include_once 'components/_hero.php'; ?>
        <?php include_once 'components/_modals.php'; ?>


    </div>

</section>

<?php include_once 'components/_footer.php'; ?>