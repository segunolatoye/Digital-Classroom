<?php
include_once "url.php";
session_start();

$name= $_SESSION['username'];
$email= $_SESSION['email'];

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "view/template_layout/head.php" ?>

<body class="fix-header fix-sidebar">
<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /></svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <div class="unix-login">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-4">
                    <div class="login-content card">
                        <div class="login-form">
                            <h4>Set Password</h4>
                            <form action="Controller/setPasswordCTRL.php" method="post">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="" value="<?php echo $name?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="<?php echo $email?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password">
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

</div>
<!-- End Wrapper -->
<?php include_once'view/head_of_the_dpt/template_lay/script.php' ?>


</body>
</html>