<?php
session_start();
if(isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Notic.php";
    include_once "../../Model/rf_batch.php";
    include_once "../../Model/rf_session.php";
    include_once "../../Model/Subject.php";


    $obj = new Notic();
    $allDpt = $obj->showDpt();
    $obj = new rf_batch();
    $allBatch = $obj->allBatch();
    $obj = new rf_session();
    $allSession = $obj->allSession();
    $obj = new Subject();
    $allSubject = $obj->showSubject();

    include_once "../../Model/addteacher.php";
    $tcr = new addteacher();
    $allTeacher = $tcr->getAllById($_SESSION['id']);
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
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Dashboard</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Add Your Notic</h4>
                                <form method="post" action="../../Controller/addNotice.php" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="textarea_editor form-control" rows="15" name="notice"
                                                  placeholder="Enter text ..." style="height:450px"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary m-b-10">Publish</button>

                                </form>
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
    </div>
    <!-- End Wrapper -->
    <?php include_once 'template_lay/script.php' ?>
    <script>
        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
            echo "swal(\"Success\", \"Successful\", \"success\");";
            $_SESSION['msg'] = 0;
        } ?>
    </script>
    </body>

    </html>

    <?php
}
else{
    header('Location:../../index.php');
}?>