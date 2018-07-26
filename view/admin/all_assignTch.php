<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/AssignTeacher.php";

    $obj = new AssignTeacher();
    $allassigntch = $obj->allAssigntch();
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
                    <h3 class="text-primary">Show Assign Teacher</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Show Assign Teacher</li>
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
                                <h4>Show Teacher </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Subject</th>
                                            <th>Session</th>
                                            <th>Batch</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $serial = 0;
                                        foreach ($allassigntch as $oneTch) {
                                            $serial++ ?>
                                            <tr>
                                                <th scope="row"><?php echo $serial ?></th>
                                                <td><?php echo $oneTch['name'] ?></td>
                                                <td><?php echo $oneTch['dpt_name'] ?></td>
                                                <td><?php echo $oneTch['subject_name'] ?></td>
                                                <td><?php echo $oneTch['session_name'] ?></td>
                                                <td><?php echo $oneTch['batch_name'] ?></td>
                                                <td style="width: 100px">
                                                    <button class="btn btn-circle btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#MyModal<?php echo $oneTch['id'] ?>"><i
                                                                class="fa fa-trash-o" style="font-size: large"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <div id="MyModal<?php echo $oneTch['id'] ?>" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="myModalLabel"
                                                                style="text-align: center;font-size: 30px;">Are You Sure
                                                                Want to Delete</h1>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-danger btn-rounded m-b-10 m-l-5"
                                                                    data-dismiss="modal">NO
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary btn-rounded m-b-10 m-l-5"><a
                                                                        href="../../Controller/assignTeacher.php?assign_id=<?php echo $oneTch['id'] ?>">YES</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    </div>
    <!-- End Wrapper -->
    <?php include_once 'template_lay/script.php' ?>


    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>