<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/AddSubject.php";

    $obj = new AddSubject();
    $all = $obj->showSubject();
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
                    <h3 class="text-primary">Add Subject</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Subject</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->

            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="card card-outline-primary">
                            <div class="card-header" style="margin-bottom: 20px">
                                <h4 class="m-b-0 text-white">Add Subject</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="../../Controller/addSubjectCTRl.php" method="post"
                                          novalidate="novalidate">
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-12 ">
                                                    <div class="form-group">
                                                        <label>Subject Name</label>
                                                        <input type="text" class="form-control" name="subject">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-actions">
                                            <button type="submit" class="btn btn-success btn sweet-success"><i
                                                        class="fa fa-check"></i> Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-title">
                                <h4>Show Subject </h4>

                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Subject Name</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $serial = 0;
                                        foreach ($all as $one) {
                                            $serial++ ?>
                                            <tr>
                                                <th scope="row"><?php echo $serial ?></th>
                                                <td><?php echo $one->subject_name ?></td>
                                                <td>
                                                    <button class="btn btn-circle btn-outline-primary"
                                                            data-toggle="modal"
                                                            data-target="#exampleModalCenter<?php echo $one->id ?>"><i
                                                                class="fa fa-pencil" style="font-size: large"></i>
                                                    </button>
                                                    <button class="btn btn-circle btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#MyModal<?php echo $one->id ?>"><i
                                                                class="fa fa-trash-o" style="font-size: large"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModalCenter<?php echo $one->id ?>"
                                                 tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                                                 aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLongTitle">Edit
                                                                Subject Name</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <form action="../../Controller/addSubjectCTRl.php?id=<?php echo $one->id ?>"
                                                              method="post">
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <input type="text" class="form-control"
                                                                           name="sub_name"
                                                                           value="<?php echo $one->subject_name ?>">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a class="btn btn-danger"
                                                                   data-dismiss="modal">Cancel</a>
                                                                <button type="submit" class="btn btn-primary" href="">
                                                                    Edit
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="MyModal<?php echo $one->id ?>" class="modal fade"
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
                                                                <a href="../../Controller/addSubjectCTRl.php?sub_id=<?php echo $one->id?>">YES</a>
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
    <script>
        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
            echo "swal(\"Success\", \"Successful\", \"success\");";
            $_SESSION['msg'] = 0;
        } ?>
    </script>

    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>