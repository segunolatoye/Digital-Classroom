<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Subject.php";
    include_once "../../Model/Notifications.php";

    $obj = new Subject();
    $alllec = $obj->showSubject();

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
                    <h3 class="text-primary">Show Lecture</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Show Lecture</li>
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
                                <h4>Show Lecture </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Subject</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $serial = 0;
                                        foreach ($alllec as $onesublec) {
                                            $serial++ ?>
                                            <tr>
                                                <th scope="row"><?php echo $serial ?></th>
                                                <td><?php echo $onesublec->subject_name ?></td>
                                                <td style="width: 100px">
                                                    <a href="Showlecture.php?id=<?php echo $onesublec->id ?>"
                                                       class="btn btn-circle btn-outline-primary"><i class="fa fa-info"
                                                                                                     style="font-size: large"></i></a>
                                                    <!--<button class="btn btn-circle btn-outline-danger" data-toggle="modal" data-target="#MyModal<?php /*echo $onesublec->id*/ ?>"><i class="fa fa-trash-o" style="font-size: large"></i></button>-->
                                                </td>
                                            </tr>
                                            <!--                                        <div id="MyModal--><?php // echo $onesublec->id?><!--" class="modal fade" role="dialog">-->
                                            <!--                                            <div class="modal-dialog">-->
                                            <!--                                                <!-- Modal content-->
                                            <!--                                                <div class="modal-content">-->
                                            <!--                                                    <div class="modal-header">-->
                                            <!--                                                        <h1 class="modal-title" id="myModalLabel" style="text-align: center;font-size: 25px;">Are You Sure Want to Delete all lecture</h1>-->
                                            <!--                                                    </div>-->
                                            <!--                                                    <div class="modal-footer">-->
                                            <!--                                                        <button type="button" class="btn btn-danger btn-rounded m-b-10 m-l-5" data-dismiss="modal">NO</button>-->
                                            <!--                                                        <button type="submit" class="btn btn-primary btn-rounded m-b-10 m-l-5"><a href="../../Controller/lecture.php?id=--><?php // echo $onesublec->id?><!--" >YES</a></button>-->
                                            <!--                                                    </div>-->
                                            <!--                                                </div>-->
                                            <!--                                            </div>-->
                                            <!--                                        </div>-->
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