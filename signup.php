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
      <h2>Register your account</h2>
      <p class="login-system-sub-head">We won't save your details</p>

      <form class="login-system-form" action="parts/_handleSignUp.php" method="post">
        <label for="signup-username">Username: </label>
        <input type="text" name="signup-username" value="<?php echo $savedUsername; ?>" />
        <!-- 
        <label for="signup-username">Email: </label>
        <input type="text" name="signup-username" /> -->

        <label for="signup-password">Password: </label>
        <input type="text" name="signup-password" />

        <label for="signup-cpassword">Confirm Password: </label>
        <input type="text" name="signup-cpassword" />

        <button type="submit">Add Account</button>
      </form>

      <?php
      if (isset($_GET['errorMsg'])) {
        echo '<p class="text-red login-system-error">' . $_GET['errorMsg'] . '</p>';
      } ?>


      <p class="login-system-sub-head login-prompt flex justify-center ">Already have an account ? <a href="login.php"
          class="text-black mx-2"> Log in</a></p>
    </div>
  </div>
  <div class="login-system-image-container">
    <!-- <img src="assets/images/login-system.jpg" alt="Wishlister" /> -->
  </div>
</section>

<?php include_once 'components/_footer.php'; ?>