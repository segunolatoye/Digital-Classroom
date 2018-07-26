<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/result.php";
    include_once "../../Model/Notifications.php";

    if (array_key_exists('id', $_GET)) {
        $notification = new Notifications();
        $notification->updateNotification($_GET['id']);
    }
    $obj = new result();
    $allRslt = $obj->showReslutByTcrpublush();

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
                    <h3 class="text-primary">Show Result</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Show Result</li>
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
                                <h4>All Created Result List</h4>
                            </div>

                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Subject</th>
                                            <th>Session</th>
                                            <th>Batch</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $serial = 0;
                                        foreach ($allRslt as $rslt) {
                                            $serial++ ?>
                                            <tr>
                                                <th scope="row"><?php echo $serial ?></th>
                                                <td><?php echo $rslt->subject_name ?></td>
                                                <td><?php echo $rslt->session_name ?></td>
                                                <td><?php echo $rslt->batch_name ?></td>
                                                <td style="width: 100px;!important;">
                                                    <a href="resultDetailByID.php?mstrID=<?php echo $rslt->id ?>"
                                                       class="btn btn-outline-primary btn-circle "><i
                                                                style="font-size: large" class="fa fa-list"></i></a>
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

    <script>
        function publish(e) {
            var id = e.id;
            swal({
                    title: "Are You Sure Want To Publish This Result ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#e2cc37",
                    confirmButtonText: "Publish",
                    closeOnConfirm: true
                },
                function () {
                    location.href = "../../Controller/resultCtrl.php?pubId=" + id;
                });
        }

        function unpublish(e) {
            var id = e.id;
            swal({
                    title: "Are You Sure Want To Unpublish This Result ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#e2cc37",
                    confirmButtonText: "Unpublish",
                    closeOnConfirm: true
                },
                function () {
                    location.href = "../../Controller/resultCtrl.php?unpubId=" + id;
                });
        }

        function del(e) {
            var id = e.id;
            swal({
                    title: "Are You Sure Want To Delete This Result ?",
                    type: "error",
                    showCancelButton: true,
                    confirmButtonColor: "#e20812",
                    confirmButtonText: "Delete",
                    closeOnConfirm: true
                },
                function () {
                    location.href = "../../Controller/resultCtrl.php?delId=" + id;
                });
        }
    </script>

    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>