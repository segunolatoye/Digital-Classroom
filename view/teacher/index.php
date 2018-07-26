<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Lecture.php";
    $lec = new Lecture();
    $allLec = $lec->getAllBy();

    include_once "../../Model/addteacher.php";
    $tea = new addteacher();
    $numOfTeacher = $tea->numberOfTeacher();
    $allTeacher = $tea->getAllById($_SESSION['id']);

    include_once "../../Model/students.php";
    $std = new students();
    $numOfStudent = $std->numberOfStudent();

    include_once "../../Model/Lecture.php";
    $lecture = new Lecture();
    $numOfLecture = $lecture->numberOfLecture();
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
                    <h3 class="text-primary">Dashboard</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-file f-s-40 color-primary"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $numOfLecture ?></h2>
                                    <p class="m-b-0">Uploaded Lecture</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-danger"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $numOfTeacher ?></h2>
                                    <p class="m-b-0">Teacher</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card p-30">
                            <div class="media">
                                <div class="media-left meida media-middle">
                                    <span><i class="fa fa-user f-s-40 color-warning"></i></span>
                                </div>
                                <div class="media-body media-text-right">
                                    <h2><?php echo $numOfStudent ?></h2>
                                    <p class="m-b-0">Student</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row bg-white m-l-0 m-r-0 box-shadow ">
                    <!-- column -->
                    <div style="margin:0px auto">
                        <div class="col-lg-8">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">News Feed</h4>
                                    <div id="extra-area-chart"></div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane active" id="home" role="tabpanel">
                                <div class="card-body">
                                    <?php foreach ($allLec as $item) { ?>

                                        <div class="profiletimeline">
                                            <div class="sl-item">
                                                <div class="sl-left"><img
                                                            src="<?php echo base_url ?>upload/image/<?php echo $item->photo ?>"
                                                            alt="<?php echo $item->name ?>" class="img-circle"/></div>
                                                <div class="sl-right">
                                                    <div><a href="#"
                                                            class="link"><strong><?php echo $item->name ?></strong></a>
                                                        <span class="">shared a lecture of <strong><?php echo $item->subject_name ?></strong></span><br>
                                                        <span class="sl-date"><?php
                                                            $upload_date = date_create("$item->upload_time");
                                                            $current_date = date_create(date("Y-m-d h:i:s"));
                                                            $interval = date_diff($current_date, $upload_date);
                                                            print $interval->format("%d Days %h hours %i minutes ago")
                                                            ?></span>
                                                        <div class="row">
                                                            <div class="col-lg-3 col-md-6 m-b-20"><img
                                                                        src="<?php echo base_url ?>upload/image/lecture.jpg"
                                                                        class="img-responsive radius"/></div>
                                                        </div>
                                                        <span><a href="<?php echo base_url ?>upload/<?php echo $item->lec_file ?>"
                                                                 target="_blank">Click Here To Show Details</a></span>
                                                        <!--                                                        <p><a href="-->
                                                        <?php //echo base_url?><!--upload/-->
                                                        <?php //echo $item->lec_file?><!--">view or download</a></p>-->
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </div>
                                    <?php } ?>
                                    <div style="text-align: right">
                                        <a href="Alllecture.php">
                                            <button type="button" class="btn btn-info btn-xs m-b-10 m-l-5">view all
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                    </div>
                    <!-- column -->
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