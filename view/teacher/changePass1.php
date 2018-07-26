<?php
include_once "../../url.php";
?>
<!DOCTYPE html>
<html lang="en">

<?php include_once "../template_layout/head.php" ?>

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
                        <a class="login-form">
                            <a href="index.php"><button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">back</button></a>
                            <h4 style="text-align: center;">Current Pssword</h4>
                            <form action="../../Controller/teacherUpdateCtrl.php" method="post" style="text-align: center;">
                                <div class="form-group">
                                    <input type="password" name="c_pass" class="form-control" placeholder="Current Password" required>
                                </div>
                                <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Next</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- End Wrapper -->
<?php include_once'template_lay/script.php' ?>


</body>
</html>