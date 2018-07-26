<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/rf_department.php";
    include_once "../../Model/rf_batch.php";
    include_once "../../Model/rf_session.php";
    include_once "../../Model/addteacher.php";
    include_once "../../Model/Subject.php";

    $obj = new Subject();
    $allSub = $obj->showSubject();

    $obj = new rf_department();
    $allDpt = $obj->allDpt();

    $obj = new rf_batch();
    $allBatch = $obj->allBatch();

    $obj = new rf_session();
    $allSession = $obj->allSession();

    $obj = new addteacher();
    $allTeacher = $obj->showteacherList();
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
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Assign Teacher</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Assign Teacher</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card  card-outline-primary">
                            <div class="card-header" style="margin-bottom: 20px">
                                <h4 class="m-b-0 text-white">Assign Teacher</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation"><!---->
                                    <form class="form-valide" action="../../Controller/assignTeacher.php" method="post">
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">All Teachers<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <select class="form-control" id="val-skill" name="teacher_id">
                                                    <option value="">Select Teacher</option>

                                                    <?php
                                                    foreach ($allTeacher as $Teacher) {
                                                        ?>
                                                        <option value="<?php echo $Teacher['id'] ?>"> <?php echo $Teacher['name'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">All Department<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <select class="form-control" id="val-skill" name="dpt_id">
                                                    <option value="">Select Department</option>

                                                    <?php
                                                    foreach ($allDpt as $Dpt) {
                                                        ?>
                                                        <option value="<?php echo $Dpt['id'] ?>"> <?php echo $Dpt['dpt_name'] ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">All Batch<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <select class="form-control" id="val-skill" name="batch_id">
                                                    <option value="">Select Batch</option>

                                                    <?php
                                                    foreach ($allBatch as $Batch) {
                                                        ?>
                                                        <option value="<?php echo $Batch->id ?>"> <?php echo $Batch->batch_name ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">All Session<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <select class="form-control" id="val-skill" name="session_id">
                                                    <option value="">Select Session</option>

                                                    <?php
                                                    foreach ($allSession as $Session) {
                                                        ?>
                                                        <option value="<?php echo $Session->id ?>"> <?php echo $Session->session_name ?></option>
                                                    <?php } ?>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-skill">All Subjects<span
                                                        class="text-danger">*</span></label>
                                            <div class="col-lg-7">
                                                <select class="form-control" id="val-skill" name="subject_id">
                                                    <option value="">Select Subject</option>

                                                    <?php
                                                    foreach ($allSub as $Sub) {
                                                        ?>
                                                        <option value="<?php echo $Sub->id ?>"> <?php echo $Sub->subject_name ?></option>
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
            echo "swal(\"Success\", \"New Assign Teacher Added Successful\", \"success\");";
            $_SESSION['msg'] = 0;
        } ?>
    </script>
    </body>
    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>