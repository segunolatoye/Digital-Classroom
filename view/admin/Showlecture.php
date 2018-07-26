<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Lecture.php";
    $obj = new Lecture();
    $alllecbysub = $obj->showsublec($_GET['id']);

    include_once "../../Model/addteacher.php";
    $tcr = new addteacher();
    $allTeacher = $tcr->getAllById($_SESSION['id']);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <?php include_once "../template_layout/head.php" ?>
    <style>
        .lectures {
            background: #fff;
            box-sizing: border-box;
            -webkit-box-shadow: 2px 2px 4px 5px #ccc;
            -moz-box-shadow: 2px 2px 4px 5px #ccc;
            box-shadow: 2px 2px 4px 5px #ccc;
        }

        .lecture {
        }

        .lecture ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .lecture ul li {
            border: 1px solid #a4abbb;
            border-radius: 5px;
            min-height: 80px;
        }

        .serial {
            border-right: 2px solid #a4abbb;
            line-height: 34px;
            font-size: 21px;
            text-align: right;
            margin-top: 12px;
        }
    </style>

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
                <section id="main-content" style="min-height: 95vh">
                    <section class="wrapper">
                        <div class="row">
                            <div class="content col-lg-12">


                                <div class="lectures col-lg-12" style="min-height: 60vh">
                                    <h3>
                                        <i class="fa fa-angle-right"></i> Show Lecture
                                    </h3>

                                    <?php $serial = 0;
                                    foreach ($alllecbysub as $singlelec) {
                                        ?>

                                        <nav class="lecture">
                                            <ul>
                                                <li>
                                                    <div class="row">
                                                        <div class="serial col-lg-1">
                                                            <p><?php echo $serial = $serial + 1; ?></p>
                                                        </div>
                                                        <div class="file-name col-lg-9">
                                                            <h4 style="margin-top: 10px;"><?php echo $singlelec['title'] ?></h4>
                                                            <span><?php

                                                                date_default_timezone_set('Asia/Dhaka');
                                                                $currenttime = date('Y-m-d h:i:s');

                                                                $uploadtime = $singlelec['upload_time'];

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
                                                                ?></span>
                                                        </div>
                                                        <div class="options col-lg-2">
                                                            <h5 style="margin-top: 10px;"><?php echo $singlelec['name'] ?></h5>
                                                            <span><a href="<?php echo base_url ?>upload/<?php echo $singlelec['lec_file'] ?>"
                                                                     target="_blank">Click Here To Show Details</a></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </nav>

                                    <?php } ?>

                                </div>


                            </div>
                        </div>
                    </section>
                </section>
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