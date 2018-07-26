<?php
include_once "url.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "view/template_layout/head.php" ?>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">

    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Check Your Email To Set verification code</h4>
                            <form action="Controller/forgotpass.php" method="post">
                                <div class="form-group">
                                    <label>Verification Code</label>
                                    <input type="password" name="pass" class="form-control" placeholder="Verification Code">
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Next</button>
                                <div class="register-link m-t-15 text-center">
                                    <a href="index.php"> Sign In Here</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- End Wrapper -->
<?php include_once'view/head_of_the_dpt/template_lay/script.php' ?>


</body>
</html>