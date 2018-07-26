<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/addteacher.php";

    $obj = new addteacher();
    $allteacher = $obj->showteacher($_GET['dpt_id']);
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
                                <h4>Show Teacher </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive m-t-40">
                                    <table id="myTable" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>Serial</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Mobile</th>
                                            <th>Email</th>
                                            <th>Info</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $serial = 0;
                                        foreach ($allteacher as $oneteacher) {
                                            $serial++ ?>
                                            <tr>
                                                <th scope="row"><?php echo $serial ?></th>
                                                <td><?php echo $oneteacher['name'] ?></td>
                                                <td><?php echo $oneteacher['dpt_name'] ?></td>
                                                <td><?php echo $oneteacher['mobile'] ?></td>
                                                <td><?php echo $oneteacher['email'] ?></td>
                                                <td><?php echo $oneteacher['info'] ?></td>
                                                <td style="width: 100px">
                                                    <button class="btn btn-circle btn-outline-primary"
                                                            data-toggle="modal"
                                                            data-target="#myModal<?php echo $oneteacher['id'] ?>"><i
                                                                class="fa fa-pencil" style="font-size: large"></i>
                                                    </button>
                                                    <button class="btn btn-circle btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#MyModal<?php echo $oneteacher['id'] ?>"><i
                                                                class="fa fa-trash-o" style="font-size: large"></i>
                                                    </button>
                                                </td>
                                            </tr>

                                            <div id="myModal<?php echo $oneteacher['id'] ?>" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="myModalLabel"
                                                                style="text-align: center;font-weight: bold;">Edit
                                                                Teacher Info</h1>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="../../Controller/addteacherCtrl.php?tech_id=<?php echo $oneteacher['id'] ?>&dpt_id=<?php echo $_GET['dpt_id']?>"
                                                                  method="post">
                                                                <div class="form-group">
                                                                    <label class="col-form-label" for="val-username">Name</label>
                                                                    <input type="text"
                                                                           value="<?php echo $oneteacher['name'] ?>"
                                                                           class="form-control" id="val-username"
                                                                           name="name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label" for="val-phoneus">Mobile</label>
                                                                    <input type="number"
                                                                           value="<?php echo $oneteacher['mobile'] ?>"
                                                                           class="form-control" id="val-phoneus"
                                                                           name="mobile">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="col-form-label"
                                                                           for="val-info">Info</label>
                                                                    <textarea type="text" class="form-control"
                                                                              id="val-info" name="Info"
                                                                              style="padding-bottom: 70px"><?php echo $oneteacher['info'] ?></textarea>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                            class="btn btn-danger btn-rounded m-b-10 m-l-5"
                                                                            data-dismiss="modal">Close
                                                                    </button>
                                                                    <button type="submit"
                                                                            class="btn btn-success btn sweet-success btn-rounded m-b-10 m-l-5">
                                                                        Save Changes
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="MyModal<?php echo $oneteacher['id'] ?>" class="modal fade"
                                                 role="dialog">
                                                <div class="modal-dialog">
                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title" id="myModalLabel"
                                                                style="text-align: center;font-size: 30px;">Are You Sure
                                                                Want to Delete</h1>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button"
                                                                    class="btn btn-danger btn-rounded m-b-10 m-l-5"
                                                                    data-dismiss="modal">NO
                                                            </button>
                                                            <button type="submit"
                                                                    class="btn btn-primary btn btn-rounded m-b-10 m-l-5">
                                                                <a href="../../Controller/addteacherCtrl.php?tech_id=<?php echo $oneteacher['id'] ?>&dpt_id=<?php echo $_GET['dpt_id']?>">YES</a>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
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
    <?php include_once 'template_lay/script.php' ?>
    <script>
        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
            echo "swal(\"Success\", \"Teacher Edit Successful\", \"success\");";
            $_SESSION['msg'] = 0;
        }?>
    </script>
    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>