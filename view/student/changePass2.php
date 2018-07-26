<?php
include_once "../../url.php";
session_start();

include_once "../../Model/students.php";
$d=new students();
$all=$d->getAllById($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="en">

<?php include_once "../template_layout/head.php" ?>

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
                            <h4>Change Password</h4>
                            <form action="../../Controller/studentUpdateCtrl.php" method="post" onsubmit="return checkPass()">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="" value="<?php echo $all['name']?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" placeholder="" value="<?php echo $all['email']?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input type="password" name="pass_1" class="form-control" placeholder="New Password" id="pass_1" required>
                                </div>
                                <div class="form-group">
                                    <label>Retype Password</label>
                                    <input type="password" name="pass_2" class="form-control" placeholder="Retype Password" id="pass_2" required>
                                </div>
                                <button id="change" type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30">Change</button>
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
<?php include_once'template_lay/script.php' ?>

<script>
    function checkPass() {
        var newPass=document.getElementById('pass_1').value;
        var rePass=document.getElementById('pass_2').value;

        if (newPass!=rePass){
             alert("don't match password ");
            return false
        }
        else {
            return true;
        }
    }

</script>


</body>
</html>