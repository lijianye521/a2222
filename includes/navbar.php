<nav class="navbar navbar-expand-md navbar-dark bg-dark mb-3">
    <div class="container">
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a class="navbar-brand" href="#">
                    <img src="../assets/images/logo.png" alt="Logo" width="30" height="24"
                        class="d-inline-block align-text-top">
                    LIFE
                </a>
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="blognews.php" class="nav-item nav-link">Blog And News</a>
                <a href="contactus.php" class="nav-item nav-link">Contact us</a>


                <?php if(isUserLoggedIn()) { ?>
                <!--if the user has been log in the services page will display-->
                <a href="myServices.php" class="nav-item nav-link">myServices</a>
                <?php } ?>
            </div>


            <div class="navbar-nav ml-auto">
                <?php if(isUserLoggedIn()) { ?>
                <span class="nav-item nav-link text-light">
                    Welcome, <?php echo getLoggedInUser()['first_name']; ?>
                </span>
                <a href="logout.php" class="nav-item nav-link">Logout</a>
                <?php } else { ?>
                <!--if the user has not been log in ,the navbar will display the Register and log in -->
                <a href="register.php" class="nav-item nav-link">Register</a>
                <a href="login.php" class="nav-item nav-link">Login</a>
                <?php } ?>
            </div>
        </div>
    </div>
</nav>