<section class="header">
    <!--! Left side -->
    <div>
        <div id="addCatagoryBtn" class="header-btn flex justify-center items-center  ">
            <i data-feather='plus'></i>
            <p class="mx-2">
                New Catagory
            </p>
        </div>
    </div>
    <!--! Right side -->

    <div>
        <div class="profile-container">
            <img width="40px" height="40px" src="assets/images/user.png" alt="profile-image">
            <p><?php echo $_SESSION['username']; ?></p>
            <a href="parts/_logout.php">

                <i stroke-width="1.6" data-feather="log-out"></i>
            </a>

        </div>

    </div>
</section>