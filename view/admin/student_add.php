<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/rf_batch.php";
    include_once "../../Model/rf_department.php";
    include_once "../../Model/rf_session.php";
    include_once "../../Model/students.php";

    $objBatch = new rf_batch();
    $objSession = new rf_session();
    $objDepartment = new rf_department();
    $objStudent = new students();
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
                    <h3 class="text-primary">Add Student</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Student</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->

                <!--data table-->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Import Student From Excel File</h4>
                        <h6 class="card-subtitle">Import Excel (.xlsx or .xls) File Only <b>(1 Sheet)</b></h6>
                        <div class="basic-form">
                            <form class="form-valide" action="../../Controller/student_import_ctrl.php" method="post"
                                  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="customFile" name="file">
                                            <label class="custom-file-label" for="customFile">Choose Excel file</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="department" class="form-control">
                                                <option disabled selected>Choose Department</option>
                                                <?php
                                                $allDepartment = $objDepartment->allDpt();
                                                foreach ($allDepartment as $department) { ?>
                                                    <option value="<?php echo $department['id'] ?>"><?php echo $department['dpt_name'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select name="batch" class="form-control">
                                                <option disabled selected>Choose Batch</option>
                                                <?php
                                                $allBatch = $objBatch->allBatch();
                                                foreach ($allBatch as $batch) { ?>
                                                    <option value="<?php echo $batch->id ?>"><?php echo $batch->batch_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <select name="session" class="form-control">
                                                <option disabled selected>Choose Session</option>
                                                <?php
                                                $allSession = $objSession->allSession();
                                                foreach ($allSession as $session) { ?>
                                                    <option value="<?php echo $session->id ?>"><?php echo $session->session_name ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-rounded btn-outline-primary">Import
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                        <h4 class="card-title">All Students Batch</h4>
                        <h6 class="card-subtitle">Export All data as Copy,CSV,Excel,PDF & Print (.xlsx or .xls) File
                            Only</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover  table-bordered"
                                   cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Department</th>
                                    <th>Session</th>
                                    <th>Batch</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $allStudent = $objStudent->all_std_master();
                                $s = 1;
                                foreach ($allStudent as $std) { ?>
                                    <tr>
                                        <td><?php echo $s++ ?></td>
                                        <td><?php echo $std->dpt_name ?></td>
                                        <td><?php echo $std->session_name ?></td>
                                        <td><?php echo $std->batch_name ?></td>
                                        <td>
                                            <a href="student_details.php?id=<?php echo $std->id ?>"
                                               class="btn btn-circle btn-outline-primary"><i class="fa fa-info"
                                                                                             style="font-size: large"></i></a>
                                            <button value="<?php echo $std->id ?>" onclick="del_set(this)"
                                                    class="btn btn-circle btn-outline-danger" data-toggle="modal"
                                                    data-target="#myModal"><i class="fa fa-trash-o"
                                                                              style="font-size: large"></i></button>
                                        </td>
                                    </tr>
                                <?php } ?>
                                </tbody>

                            </table>
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

    <!-- Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Delete</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="../../Controller/students.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="del_master_id" value="" id="del_master_id">
                        Are You Sure Want to <span class="text-danger">Delete</span> This Batch With All Students ???
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <?php include_once 'template_lay/script.php' ?>
    <script src="../../Resource/js/lib/sweetalert/sweetalert.min.js"></script>
    <script>
        function del_set(element) {

            document.getElementById("del_master_id").value = element.value.toString();
        }

        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
            echo "swal(\"Success\", \"New Students Added From Excel Sheet\", \"success\");";
            $_SESSION['msg'] = 0;
        } elseif (isset($_SESSION['msg']) && $_SESSION['msg'] === 2) {
            echo "swal(\"Failed\", \"While,New Students Added From Excel Sheet\", \"error\");";
            $_SESSION['msg'] = 0;
        } elseif (isset($_SESSION['msg']) && $_SESSION['msg'] === 3) {
            echo "swal(\"Deleted\", \"Successfully Deleted All Student & Batch\", \"error\");";
            $_SESSION['msg'] = 0;
        }
        ?>

    </script>
    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>