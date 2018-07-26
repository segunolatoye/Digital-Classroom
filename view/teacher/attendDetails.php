<?php
session_start();
if (isset($_SESSION['id'])){
include_once "../../url.php";
include_once "../../Model/attendance.php";

$obj = new attendance();

$master_id = $_GET['mstrID'];
$all = $obj->atndDetailById($_GET['mstrID']);

include_once "../../Model/addteacher.php";
$tcr=new addteacher();
$allTeacher=$tcr->getAllById($_SESSION['id']);
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
                <h3 class="text-primary">All Student Attendances</h3></div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                    <li class="breadcrumb-item active">All Student Attendances</li>
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
                                <table id="myTable" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Serial</th>
                                        <th>Date</th>
                                        <th>Student Name</th>
                                        <th>Attend</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $serial = 0;
                                    foreach ($all as $singl) {
                                        $serial++ ?>
                                        <tr>
                                            <th scope="row"><?php echo $serial ?></th>
                                            <td><?php echo $singl->date ?></td>
                                            <td><?php echo $singl->name ?></td>
                                            <td><?php echo $singl->attend ?></td>
                                            <td>
                                                <button data-toggle="modal" data-target="#exampleModalCenter<?php echo $serial ?>"
                                                        class="btn btn-outline-primary btn-circle"><i
                                                            style="font-size: large" class="fa fa-pencil"></i></button>

                                                <div class="modal fade" id="exampleModalCenter<?php echo $serial?>"
                                                     tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                     aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">Edit Subject Name</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                        aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <form class="form-inline" action="../../Controller/attendanceEdit.php?master_id=<?php echo $master_id?>&id=<?php echo $singl->id?>"
                                                                  method="post">
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <input type="radio" class="form-control" name="attendance" value="1">Present
                                                                        <input type="radio" class="form-control" name="attendance" value="0">Absent
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn btn-danger" data-dismiss="modal">Cancel</a>
                                                                    <input type="submit" class="btn btn-primary" value="Edit">
                                                                </div>
                                                            </form>
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
}
    ?>