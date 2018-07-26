<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/students.php";

    $obj = new students();
    $allStd = $obj->stdByBatch($_GET['s'], $_GET['d'], $_GET['b']);
    $s = $_GET['s'];
    $d = $_GET['d'];
    $b = $_GET['b'];
    $ssn = $_GET['ssn'];

    include_once "../../Model/addteacher.php";
    $tcr = new addteacher();
    $allTeacher = $tcr->getAllById($_SESSION['id']);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include_once "../template_layout/head.php" ?>
    </head>

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
                    <h3 class="text-primary">Show Teacher</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Show Teacher</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>All Batch </h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="display table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>Email</th>
                                            <th>Photo</th>
                                            <th style="text-align: left">Status</th>
                                            <th>Edit</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $serial = 0;
                                        foreach ($allStd as $std) {
                                            $serial++ ?>
                                            <tr>
                                                <td style="width: 50px"><?php echo $serial ?></td>
                                                <td><?php echo $std->name ?></td>
                                                <td><?php echo $std->student_id ?></td>
                                                <td><?php echo $std->email ?></td>
                                                <td><img style="height: 35px;width: 35px"
                                                         src="<?php echo base_url ?>upload/image/<?php echo $std->photo ?>"
                                                         alt=""></td>
                                                <td style="text-align: left;"><?php echo $std->status ?></td>
                                                <td>
                                                    <button data-toggle="modal"
                                                            data-target="#exampleModalCenter<?php echo $serial ?>"
                                                            class="btn btn-circle btn-outline-info"><i
                                                                style="font-size: large" class="fa fa-pencil"></i>
                                                    </button>
                                                    <div class="modal fade" id="exampleModalCenter<?php echo $serial ?>"
                                                         tabindex="-1" role="dialog"
                                                         aria-labelledby="exampleModalCenterTitle"
                                                         aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">
                                                                        Edit Student Status</h5>
                                                                    <button type="button" class="close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body" align="left">
                                                                    <h5>Are You Want to
                                                                        Deactivate <?php echo $std->name ?>?</h5>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-danger"
                                                                       data-dismiss="modal">NO</a>
                                                                    <a type="submit" class="btn btn-primary"
                                                                       href="../../Controller/StudentEdit.php?std_id=<?php echo $std->student_id ?>&s=<?php echo $s ?>&d=<?php echo $d ?>&b=<?php echo $b ?>&ssn=<?php echo $ssn ?>">Yes</a>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>

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
    <!-- End Wrapper -->
    <?php include_once 'template_lay/script.php' ?>
    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>