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
                            <h4>Forgot Password</h4>
                            <form action="Controller/forgotpass.php" method="post">
                                <div class="form-group">
                                    <label>Select Your Role</label>
                                    <select class="form-control" name="role">
                                        <option value="">Please select One</option>
                                        <option value="Student">Student</option>
                                        <option value="Teacher">Teacher</option>
                                        <option value="Dpt_Head">Head Of The Department</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Email address</label>
                                    <input type="email" name="email" class="form-control" placeholder="Email">
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