<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/result.php";
    $obj = new result();
    $allRslt = $obj->showReslutByTcr($_SESSION['id']);

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
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Attendence</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">All Batchs</li>
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
                                <h4>Created Result List</h4>
                            </div>
                            <div class="card-subtitle">
                                <p>Select for Publish/Details/Delete</p>
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
                                            <th>Department</th>
                                            <th>Status</th>
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
                                                <td><?php echo $rslt->dpt_name ?></td>
                                                <td><?php echo $rslt->status ?></td>

                                                <td style="width: 200px;!important;">
                                                    <button id="<?php echo $rslt->id ?>" onclick="del(this)"
                                                            class="btn btn-outline-danger btn-circle"><i
                                                                style="font-size: large" class="fa fa-trash-o"></i>
                                                    </button>
                                                    <button id="<?php echo $rslt->id ?>" onclick="unpublish(this)"
                                                            class="btn btn-outline-warning btn-circle" <?php echo $rslt->status == "Unpublished" ? 'disabled' : '' ?>>
                                                        <i
                                                                style="font-size: large" class="fa fa-undo"></i>
                                                    </button>
                                                    <button id="<?php echo $rslt->id ?>" onclick="publish(this)"
                                                            class="btn btn-outline-success btn-circle" <?php echo $rslt->status == "Published" ? 'disabled' : '' ?>>
                                                        <i
                                                                style="font-size: large" class="mdi mdi-publish"></i>
                                                    </button>
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
            var row = e.parentNode.parentNode.rowIndex;
            var table = document.getElementById("myTable");
            var batch = table.rows[row].cells[3].innerHTML;
            var dpt = table.rows[row].cells[4].innerHTML;
            swal({
                    title: "Are You Sure Want To Publish This Result ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#e2cc37",
                    confirmButtonText: "Publish",
                    closeOnConfirm: true
                },
                function () {
                    location.href = "../../Controller/resultCtrl.php?pubId=" + id + "&batch="+batch + "&dpt="+dpt;
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