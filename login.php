<?php include_once 'components/_header.php';
if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
  header('location: index.php');
}

//
if (isset($_GET['username'])) {
  $savedUsername = $_GET['username'];
} else {
  $savedUsername = null;
}
?>



<section class="login-system-container">
  <div class="login-system-hero-container">
    <div class="login-system-nav">
      <p>Wishlister</p>
    </div>
    <div class="login-system-hero">
      <h2>Log in to your account</h2>
      <p class="login-system-sub-head">We won't save your details</p>

      <form class="login-system-form" action="parts/_handleLogin.php" method="post">
        <label for="login-username">Username: </label>
        <input type="text" name="login-username" value="<?php echo $savedUsername; ?>" />
        <!-- 
        <label for="login-username">Email: </label>
        <input type="text" name="login-username" /> -->

        <label for="login-password">Password: </label>
        <input type="text" name="login-password" />


        <button type="submit">Add Account</button>
      </form>

      <?php
      if (isset($_GET['errorMsg'])) {
        echo '<p class="text-red login-system-error">' . $_GET['errorMsg'] . '</p>';
      } ?>

      <p class="login-system-sub-head  login-prompt flex justify-center ">New user ? <a href="signup.php"
          class="text-black mx-2"> Sign up now</a></p>
    </div>
  </div>
  <div class="login-system-image-container">
    <!-- <img src="assets/images/login-system.jpg" alt="Wishlister" /> -->
  </div>
</section>

<?php include_once 'components/_footer.php'; ?>