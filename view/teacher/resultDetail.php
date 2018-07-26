<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/students.php";
    include_once "../../Model/result.php";

    $obj = new students();
    $rsObj = new result();
    $allStd = $obj->stdByBatch($_GET['s'], $_GET['d'], $_GET['b']);

    $_SESSION['std_batch_id'] = $_GET['b'];
    $_SESSION['std_dpt_id'] = $_GET['d'];

    include_once "../../Model/addteacher.php";
    $tcr = new addteacher();
    $allTeacher = $tcr->getAllById($_SESSION['id']);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php include_once "../template_layout/head.php" ?>
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
                            <form action="resultDetail.php?s=<?php echo $_GET['s'] ?>&d=<?php echo $_GET['d'] ?>&b=<?php echo $_GET['b'] ?>&ssn=<?php echo $_GET['ssn'] ?>"
                                  method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>From</label>
                                        <input name="from" style="width: 200px" type="date"
                                               class="form-control input-rounded" placeholder="From">
                                    </div>
                                    <div class="col-md-3">
                                        <label>To</label>
                                        <input name="to" style="width: 200px" type="date"
                                               class="form-control input-rounded"
                                               placeholder="To">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Search</label>
                                        <input style="width: 200px" type="submit"
                                               class="btn btn-rounded btn-outline-info"
                                               placeholder="To" value="Search">
                                    </div>
                                </div>
                            </form>
                            <?php if (isset($_POST['from'])) { ?>

                                <div style="margin: 15px">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <label>From</label>
                                            <p><?php echo $_POST['from'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <label>To</label>
                                            <p><?php echo $_POST['to'] ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Days</label>
                                            <p><?php $da = $rsObj->totalClass($_POST['from'], $_POST['to']);
                                                echo $da->daydiff ?></p>
                                        </div>
                                        <div class="col-md-2">
                                            <label>Classes</label>
                                            <p><?php $d = $rsObj->totalClass($_POST['from'], $_POST['to']);
                                                echo $d->day ?></p>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="table-responsive m-t-40">
                                        <table id="Table" class="display table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Serial</th>
                                                <th>Name</th>
                                                <th>ID</th>
                                                <th>CT Marks</th>
                                                <th>Assignment Marks</th>
                                                <th>Mid Marks</th>
                                                <th>Final Marks</th>
                                                <th style="text-align: left">Attendence Mark</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $serial = 0;
                                            foreach ($allStd

                                                     as $std) {
                                                $serial++ ?>
                                                <tr>
                                                    <td style="width: 50px"><?php echo $serial ?></td>
                                                    <td><?php echo $std->name ?></td>
                                                    <td><?php echo $std->student_id ?></td>
                                                    <td style="width: 100px;!important;"><input id="<?php echo $serial ?>" onkeyup="setCTMark(this)" class="form-control" style="height: 100%" type="text"><p id="ct<?php echo $serial ?>" style="display: none">0</p></td>
                                                    <td style="width: 100px;!important;"><input id="<?php echo $serial ?>" onkeyup="setAssMark(this)" class="form-control" style="height: 100%" type="text"><p id="ass<?php echo $serial ?>" style="display: none">0</p></td>
                                                    <td style="width: 100px;!important;"><input id="<?php echo $serial ?>" onkeyup="setMidMark(this)" class="form-control" style="height: 100%" type="text"><p id="mid<?php echo $serial ?>" style="display: none">0</p></td>
                                                    <td style="width: 100px;!important;"><input id="<?php echo $serial ?>" onkeyup="setFnlMark(this)" class="form-control" style="height: 100%" type="text"><p id="fnl<?php echo $serial ?>" style="display: none">0</p></td>
                                                    <?php $prsnt = $rsObj->totalPresent($_POST['from'], $_POST['to'], $std->student_id); ?>
                                                    <td style="text-align: left"><?php
                                                        echo $prsnt >= ($d->day * 80 / 100) ? "10" :

                                                            $prsnt >= ($d->day * 70 / 100) ? "8" :

                                                                $prsnt >= ($d->day * 60 / 100) ? "7.50" :

                                                                    $prsnt >= ($d->day * 45 / 100) ? "5" : "0";
                                                        ?></td>

                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div style="text-align: center;margin-top: 20px">
                                        <button id="sveBtn" onclick="save()" class="btn btn-rounded btn-success"
                                                type="button">Save <i id="spin" style="font-size: 20px;"
                                                                      class="fa fa-spin fa-spinner"></i></button>
                                    </div>

                                </div>

                            <?php } ?>

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

        function setCTMark(e) {
            var id = e.id;
            var va = e.value;
            document.getElementById("ct" + id).innerHTML = va;
        }

        function setAssMark(e) {
            var id = e.id;
            var valu = e.value;
            document.getElementById("ass" + id).innerHTML = valu;
        }

        function setMidMark(e) {
            var id = e.id;
            var v = e.value;
            document.getElementById("mid" + id).innerHTML = v;
        }

        function setFnlMark(e) {
            var id = e.id;
            var val = e.value;
            console.log(val);
            document.getElementById("fnl" + id).innerHTML = val;
        }

        function save() {
            $("#sveBtn").attr("disabled", true);
            var data = makeJsonFromTable('Table');
            // console.log(a);
            data['tcr_id'] = "<?php echo $_SESSION['id']?>";
            data['sub_id'] = "<?php echo $_GET['s']?>";
            data['session_id'] = "<?php echo $_GET['ssn']?>";
            data['batch_id'] = "<?php echo $_GET['b']?>";
            data['dpt_id'] = "<?php echo $_GET['d']?>";
            console.log(data);
            $.ajax({
                type: "POST",
                url: "../../Controller/resultCtrl.php",
                data: data,
                success: function (msg) {
                    if (msg === "success") {
                        $("#sveBtn").attr("disabled", false);
                        swal({
                                title: "This Result Save Successfully !!",
                                type: "success",
                                showCancelButton: false,
                                confirmButtonColor: "#76b629",
                                confirmButtonText: "OK",
                                closeOnConfirm: false
                            },
                            function () {
                                location.href = "assaignedBatch.php";
                            });

                    }
                    else {
                        swal({
                            title: "Error !! Failed to send Database.",
                            type: "error",
                            showCancelButton: false,
                            confirmButtonColor: "#b60f14",
                            confirmButtonText: "OK",
                            closeOnConfirm: false
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