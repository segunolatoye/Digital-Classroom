<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Notifications.php";
    include_once "../../Model/Subject.php";
    $obj=new Subject();
    $allsub=$obj->showSubject();
    include_once "../../Model/students.php";
    $std = new students();
    $allStudent = $std->getAllById($_SESSION['id']);
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
                    <h3 class="text-primary">upload Assignment</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">upload Assignment</li>
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
                                <h4 class="m-b-0 text-white">Upload Lecture</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="../../Controller/Assignment.php" method="post"
                                          enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="title">Title <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="text" class="form-control" id="title" name="title"
                                                       placeholder="Enter a Title.." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">Subject <span class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <select class="form-control" name="sub_id" required>
                                                    <option value="">Please select Subject</option>

                                                    <?php
                                                    foreach ($allsub as $onesub) {
                                                        ?>
                                                        <option value="<?php echo $onesub->id?>"><?php echo $onesub->subject_name ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label">File <span
                                                    class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <input type="file" class="form-control" name="resource" placeholder="Enter a Title.." required>
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

    </body>
    </html>
    <?php
}
else{
    header('Location:../../index.php');
}?>