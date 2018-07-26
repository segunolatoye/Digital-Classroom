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
                    <h3 class="text-primary">Show Student</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Show Student</li>
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
                        <h4 class="card-title">All Students of Batch</h4>
                        <h6 class="card-subtitle">Export All data as Copy,CSV,Excel,PDF & Print (.xlsx or .xls) File
                            Only</h6>
                        <div class="table-responsive m-t-40">
                            <table id="example23" class="display nowrap table table-hover  table-bordered"
                                   cellspacing="0"
                                   width="100%">
                                <thead>
                                <tr>
                                    <th>Serial</th>
                                    <th>Name</th>
                                    <th>Student ID</th>
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Session</th>
                                    <th>Department</th>
                                    <th>Batch</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                <?php
                                $allStudent = $objStudent->stdDtailsByMasterId($_GET['id']);
                                $s = 1;
                                foreach ($allStudent as $std) { ?>
                                    <tr>
                                        <td><?php echo $s++ ?></td>
                                        <td><?php echo $std->name ?></td>
                                        <td><?php echo $std->student_id ?></td>
                                        <td><?php echo $std->email ?></td>
                                        <td><?php echo $std->pass ?></td>
                                        <td><?php echo $std->session_name ?></td>
                                        <td><?php echo $std->dpt_name ?></td>
                                        <td><?php echo $std->batch_name ?></td>
                                        <td style="width: 100px">
                                            <button id="<?php echo $std->id ?>" onclick="up_set(this)"
                                                    class="btn btn-circle btn-outline-primary" data-toggle="modal"
                                                    data-target="#myModal"><i class="fa fa-pencil"
                                                                              style="font-size: large"></i></button>
                                            <button value="<?php echo $std->id ?>" onclick="del_set(this)"
                                                    class="btn btn-circle btn-outline-danger" type="button"
                                                    data-toggle="modal"
                                                    data-target="#delModal"
                                            ><i class="fa fa-trash-o"
                                                style="font-size: large"></i>
                                            </button>
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
    <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Student Info</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="../../Controller/students.php" method="post">
                    <div class="modal-body">
                        <input type="hidden" value="" id="u_id" name="id">
                        <input type="hidden" name="master_id" value="<?php echo $_GET['id'] ?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input id="u_name" class="form-control" type="text" placeholder="Name" name="u_name"
                                           value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input id="u_email" class="form-control" type="email" placeholder="Email"
                                           name="email"
                                           value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Student ID</label>
                                    <input id="u_std_id" class="form-control" type="text" placeholder="Student ID"
                                           name="std_id"
                                           value="">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="u_pass" class="form-control" type="text" placeholder="Password"
                                           name="pass"
                                           value="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="department" class="form-control">
                                        <option disabled selected>Choose Department</option>
                                        <?php
                                        $allDepartment = $objDepartment->allDpt();
                                        foreach ($allDepartment as $department) { ?>
                                            <option value="<?php echo $department->id ?>"><?php echo $department->dpt_name ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
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
                            <div class="col-md-4">
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
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="delModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->

                <div class="modal-header">
                    <h4 class="modal-title">Delete Student</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <form action="../../Controller/students.php" method="post">
                    <input type="hidden" id="del_id" name="del_id" value="">
                    <input type="hidden" name="master_id" value="<?php echo $_GET['id'] ?>">
                    <div class="modal-body">
                        Do You Want To Delete This Student ???
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <!-- End Wrapper -->
    <?php include_once 'template_lay/script.php' ?>

    <script>
        function up_set(element) {
            var id = element.id;
            var rowNUm = element.parentNode.parentNode.rowIndex;
            var table = document.getElementById("example23");
            //var in_no=table.rows[rowNUm].cells[1].innerHTML;
            document.getElementById("u_name").value = table.rows[rowNUm].cells[1].innerHTML;
            document.getElementById("u_std_id").value = table.rows[rowNUm].cells[2].innerHTML;
            document.getElementById("u_email").value = table.rows[rowNUm].cells[3].innerHTML;
            document.getElementById("u_pass").value = table.rows[rowNUm].cells[4].innerHTML;
            document.getElementById("u_id").value = id;
        }

        function del_set(element) {
            var idd = element.value;
            console.log(idd);
            document.getElementById("del_id").value = idd;
        }

        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
            echo "swal(\"Success\", \"New Students Added From Excel Sheet\", \"success\");";
            $_SESSION['msg'] = 0;
        } elseif (isset($_SESSION['msg']) && $_SESSION['msg'] === 2) {
            echo "swal(\"Failed\", \"While,New Students Added From Excel Sheet\", \"error\");";
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