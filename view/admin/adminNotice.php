<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";

    include_once "../../Model/adminNotice.php";
    $obj=new adminNotice();
    $allnotice=$obj->shownotice();
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
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary">Notice</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Notice</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-12">
                        <?php foreach ($allnotice as $notice) { ?>
                            <?php
                            $timestamp = strtotime($notice->time);
                            $date = date('d-F-Y', $timestamp);
                            ?>
                            <div class="notice">
                                <div class="card">
                                    <div class="card-body">
                                        <h4>This is <?php echo $notice->title ?></h4>
                                        <h5><?php
                                            date_default_timezone_set('Asia/Dhaka');
                                            $currenttime = date('Y-m-d h:i:s');

                                            $uploadtime = $notice->time;

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
                                            ?></h5>
                                        <article"><?php echo $notice->notice ?></article>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php include_once "../template_layout/footer.php" ?>
            <!-- End footer -->
        </div>
    </div>
    <!-- End Wrapper -->
    <?php include_once 'template_lay/script.php' ?>


    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>