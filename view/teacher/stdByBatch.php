<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/students.php";

    $obj = new students();
    $allStd = $obj->stdByBatch($_GET['s'], $_GET['d'], $_GET['b']);


    include_once "../../Model/addteacher.php";
    $tcr = new addteacher();
    $allTeacher = $tcr->getAllById($_SESSION['id']);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include_once "../template_layout/head.php" ?>
        <style>

            .switch {
                position: relative;
                display: inline-block;
                width: 52px;
                height: 25px;
            }

            .switch input {
                display: none;
            }

            .slider {
                position: absolute;
                cursor: pointer;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: #ccc;
                -webkit-transition: .4s;
                transition: .4s;
            }

            .slider:before {
                position: absolute;
                content: "";
                height: 17px;
                width: 17px;
                left: 4px;
                bottom: 4px;
                background-color: white;
                -webkit-transition: .4s;
                transition: .4s;
            }

            input:checked + .slider {
                background-color: #3ca549;
            }

            input:focus + .slider {
                box-shadow: 0 0 1px #2196F3;
            }

            input:checked + .slider:before {
                -webkit-transform: translateX(26px);
                -ms-transform: translateX(26px);
                transform: translateX(26px);
            }

            /*!* Rounded sliders *!*/
            .slider.round {
                border-radius: 34px;
            }

            .slider.round:before {
                border-radius: 50%;
            }
        </style>
    </head>

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
                    <h3 class="text-primary">Show Teacher</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Show Teacher</li>
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
                                    <table id="myTable" class="display table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Attend</th>
                                            <th>Name</th>
                                            <th>Status</th>
                                            <th style="display:none;">id</th>
                                            <th style="text-align: left">ID</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $serial = 0;
                                        foreach ($allStd as $std) {
                                            $serial++ ?>
                                            <tr>
                                                <td style="width: 50px"><?php echo $serial ?></td>
                                                <td style="width: 70px;!important;">
                                                    <div style="height: 10px"><label class="switch"><input
                                                                    id="<?php echo $serial ?>" onchange="setVal(this)"
                                                                    type="checkbox"><span
                                                                    class="slider round"></span></label></div>
                                                    <span id="v<?php echo $serial ?>" style="display: none">0</span>
                                                </td>
                                                <td><?php echo $std->name ?></td>
                                                <td><?php echo $std->status ?></td>
                                                <td style="display:none"><?php echo $std->id ?></td>
                                                <td style="text-align: left;"><?php echo $std->student_id ?></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="text-align: center">
                                    <button id="sveBtn" onclick="save()" class="btn btn-rounded btn-success"
                                            type="button">Save <i id="spin" style="font-size: 20px;"
                                                                  class="fa fa-spin fa-spinner"></i></button>
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
        function setVal(e) {
            var id = e.id;
            var input = document.getElementById(id);
            if (input.checked) {
                document.getElementById("v" + id).innerHTML = "1";
                //console.log("v"+id);
            }
            else {
                document.getElementById("v" + id).innerHTML = "0";
                //console.log("aa")
            }

        }

        function save() {
            $("#sveBtn").attr("disabled", true);
            var data = makeJsonFromTable('myTable');
            // console.log(a);
            data['tcr_id'] = "<?php echo $_SESSION['id']?>";
            data['sub_id'] = "<?php echo $_GET['s']?>";
            data['session_id'] = "<?php echo $_GET['ssn']?>";
            data['batch_id'] = "<?php echo $_GET['b']?>";
            data['dpt_id'] = "<?php echo $_GET['d']?>";
            //console.log(s);
            $.ajax({
                type: "POST",
                url: "../../Controller/attendanceCtrl.php",
                data: data,
                success: function (msg) {
                    if (msg === "success") {
                        $("#sveBtn").attr("disabled", false);
                        swal({
                                title: "Todays Attendance Saved, Successfully !!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#76b629",
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },
                            function () {
                                location.href = "attendMastr.php";
                            });

                    }

                }
            });

        }

        $('#spin')
            .hide()  // Hide it initially
            .ajaxStart(function () {
                $(this).show();
            })
            .ajaxStop(function () {
                $(this).hide();
            });

    </script>
    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>