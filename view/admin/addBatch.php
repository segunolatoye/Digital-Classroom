<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Batch.php";
    include_once "../../Model/Department.php";

    $dpt = new Department();
    $allDpt = $dpt->showDepartment();

    $obj = new Batch();
    $all = $obj->show();
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
                    <h3 class="text-primary">Add Batch</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Batch</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->

            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card card-outline-primary">
                            <div class="card-header" style="margin-bottom: 20px">
                                <h4 class="m-b-0 text-white">Add Batch</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="../../Controller/batchCtrl.php" method="post"
                                          novalidate="novalidate">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <select class="form-control" id="val-skill" name="dpt_id">
                                                            <option value="">Select Department</option>

                                                            <?php
                                                            foreach ($allDpt as $Dpt) {
                                                                ?>
                                                                <option value="<?php echo $Dpt->id ?>"> <?php echo $Dpt->dpt_name?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Batch Name</label>
                                                        <input type="text" class="form-control" name="batch" id="name">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success btn sweet-success"><i
                                                        class="fa fa-check"></i> Save
                                            </button>
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
            echo "swal(\"Success\", \"Successful\", \"success\");";
            $_SESSION['msg'] = 0;
        } ?>
    </script>

    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>