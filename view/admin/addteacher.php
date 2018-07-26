<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/rf_department.php";
    $obj = new  rf_department();
    $alldpt = $obj->allDpt();
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <?php include_once "../template_layout/head.php" ?>

    <body class="fix-header fix-sidebar">
    <!-- Preloader - style you can find in spinners.css -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
        </svg>
    </div>
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <?php include_once "template_lay/header.php" ?>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <?php include_once "template_lay/sidebar.php" ?>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Add Teacher</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Teacher</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <div class="alert alert-warning" id="show" style="display: none">
                    <strong>Warning!</strong> This name contains certain characters that aren't allowed. Learn more
                    about our name policies.
                </div>
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card  card-outline-primary">
                            <div class="card-header" style="margin-bottom: 20px">
                                <h4 class="m-b-0 text-white">Add Teacher</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="../../Controller/addteacherCtrl.php" method="post"
                                          novalidate="novalidate">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Username <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="val-username" name="name"
                                                       placeholder="Enter a username..">
                                            </div>
                                        </div>
                                        <script>
                                            function validation() {
                                                var user = document.getElementById("name").value;

                                                if (user.match(/([<])/) == null) {
                                                    return true;
                                                }
                                                else {
                                                    document.getElementById("show").style = "display: block";

                                                    setTimeout(function () {
                                                        $('#show').fadeOut('slow');
                                                    }, 5000);

                                                    return false;
                                                }
                                            }
                                        </script>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-email">Email <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="email" class="form-control" id="val-email" name="email"
                                                       placeholder="Your valid email..">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-phoneus">Phone <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="val-phoneus" name="mobile"
                                                       placeholder="+88 01******">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-info">Description <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <textarea type="text" class="form-control" style="height: 70px"
                                                          id="val-info" name="info" placeholder="Your info.."
                                                          rows="9"></textarea>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">Department <span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <select class="form-control" id="skill" name="dpt_id">
                                                    <option value="">Please select Department</option>

                                                    <?php
                                                    foreach ($alldpt as $onedpt) {
                                                        ?>
                                                        <option value="<?php echo $onedpt['id'] ?>"><?php echo $onedpt['dpt_name'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-success btn sweet-success">Submit
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php include_once "../template_layout/footer.php" ?>
            <!-- End footer -->
        </div>
        <!-- End Page wrapper  -->
    </div>
    <!-- End Wrapper -->
    <?php include_once 'template_lay/script.php' ?>
    <script>
        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
            echo "swal(\"Success\", \"New Teacher Added Successful\", \"success\");";
            $_SESSION['msg'] = 0;
        } ?>
    </script>
    </body>
    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>