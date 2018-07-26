<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/result.php";
    include_once "../../Model/Notifications.php";

    $obj = new result();
    $allRslt = $obj->rsltDetailByID($_GET['mstrID']);

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
                                <h4>Result List</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="example23" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>ID</th>
                                            <th>CT Mark</th>
                                            <th>Assignment Mark</th>
                                            <th>Mid Mark</th>
                                            <th>Final Mark</th>
                                            <th>Attend Mark</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $serial = 0;
                                        foreach ($allRslt as $rslt) {
                                            $serial++ ?>
                                            <tr>
                                                <th scope="row"><?php echo $serial ?></th>
                                                <td><?php echo $rslt->name ?></td>
                                                <td><?php echo $rslt->std_id ?></td>
                                                <td><?php echo $rslt->ct_mrk ?></td>
                                                <td><?php echo $rslt->ass_mrk ?></td>
                                                <td><?php echo $rslt->mid_mrk ?></td>
                                                <td><?php echo $rslt->final_mrk ?></td>
                                                <td><?php echo $rslt->atnd_mrk ?></td>
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

    <!--modal-->
    <div class="modal fade" id="Modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->

                <div class="modal-header">
                    <h4 class="modal-title">Edit Marks</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="../../Controller/resultCtrl.php" method="post">
                    <input type="hidden" id="id" name="id" value="">
                    <input type="hidden" name="master_id" value="<?php echo $_GET['mstrID'] ?>">

                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="mid">Mid Mark</label>
                                <input id="mid" name="mid_mark" type="text" class="form-control input-rounded success">
                            </div>
                            <div class="col-md-6">
                                <label for="fnl">Final Mark</label>
                                <input id="fnl" name="fnl_mrk" type="text" class="form-control input-rounded success">
                            </div>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include_once 'template_lay/script.php' ?>

    <script>
        function upd_set(e) {
            document.getElementById("id").value = e.id;
            var row = e.parentNode.parentNode.rowIndex;
            //console.log(row);
            var table = document.getElementById("example23");
            document.getElementById("mid").value = table.rows[row].cells[3].innerHTML;
            document.getElementById("fnl").value = table.rows[row].cells[4].innerHTML;

        }

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