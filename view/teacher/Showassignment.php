<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Assignment.php";
    $obj = new Assignment();
    $allassignmentbysub = $obj->showassignment($_GET['id']);

    $_SESSION['book_id']=$_GET['id'];

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
                    <h3 class="text-primary">Show Assignment</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Show Assignment</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Uploader Id</th>
                                            <th>Uploader Name</th>
                                            <th>Title</th>
                                            <th>Resource</th>
                                            <th>Time</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $serial=0;
                                        foreach ($allassignmentbysub as $one){
                                        ?>
                                        <tr>
                                            <td><?php echo $serial=$serial + 1?></td>
                                            <td><?php echo $one['uploader_id']?></td>
                                            <td><?php echo $one['name']?></td>
                                            <td><?php echo $one['title']?></td>
                                            <td><a href="<?php echo base_url ?>upload/<?php echo $one['resource']?>" target="_blank">Click Here To Show Assignment</a></td>
                                            <td><?php
                                                date_default_timezone_set('Asia/Dhaka');
                                                                $currenttime = date('Y-m-d h:i:s');

                                                                $uploadtime = $one['time'];

                                                                $strt = date_create($currenttime);
                                                                $endt = date_create($uploadtime);

                                                                $s = $strt->format('Y-m-d h:i:s');
                                                                $e = $endt->format('Y-m-d h:i:s');

                                                                $datetime1 = new DateTime($s);
                                                                $datetime2 = new DateTime($e);

                                                                $interval = $datetime1->diff($datetime2);

                                                                echo $interval->d . "day ";
                                                                echo $interval->h . "h ";
                                                                echo $interval->i . "min ";
                                                                echo $interval->s . "sec ago";
                                                ?></td>
                                            <td>
                                                <button class="btn btn-circle btn-outline-primary"
                                                        data-toggle="modal"
                                                        data-target="#MyModal<?php echo $one['id'] ?>"><i
                                                            class="fa fa-check" style="font-size: large"></i>
                                                </button>
                                                <button class="btn btn-circle btn-outline-danger"
                                                        data-toggle="modal"
                                                        data-target="#myModal<?php echo $one['id'] ?>"><i
                                                            class="fa fa-cut" style="font-size: large"></i>
                                                </button>
                                            </td>
                                        </tr>
                                            <div id="MyModal<?php echo $one['id'] ?>" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="myModalLabel"
                                                                style="text-align: center;font-size: 30px;">Are You Sure
                                                                Want to Accept</h1>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-danger btn-rounded m-b-10 m-l-5"
                                                                    data-dismiss="modal">NO
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary btn btn-rounded m-b-10 m-l-5">
                                                                <a href="../../Controller/Assignment.php?ass_id=<?php echo $one['id']?>">YES</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="myModal<?php echo $one['id']?>" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="myModalLabel"
                                                                style="text-align: center;font-size: 30px;">Are You Sure
                                                                Want to Reject</h1>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-danger btn-rounded m-b-10 m-l-5"
                                                                    data-dismiss="modal">NO
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary btn btn-rounded m-b-10 m-l-5">
                                                                <a href="../../Controller/Assignment.php?assign_id=<?php echo $one['id']?>">YES</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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