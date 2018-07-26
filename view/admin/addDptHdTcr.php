<?php
session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/rf_department.php";
    include_once "../../Model/DptHeadTcr.php";
    $obj = new  rf_department();
    $obj1 = new  DptHeadTcr();
    $all_hd = $obj1->all();
    $alldpt = $obj->allDpt();
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
                    <h3 class="text-primary">Add Department Head</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Add Department Head</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">

                <div class="alert alert-warning" id="show" style="display: none">
                    <strong>Warning!</strong> This name contains certain characters that aren't allowed. Learn more
                    about our name policies.
                </div>
                <!-- Start Page Content -->
                <div class="row" style="margin-top: -25px">
                    <div class="col-lg-12">
                        <div class="card  card-outline-primary">
                            <div class="card-header" style="margin-bottom: 20px">
                                <h4 class="m-b-0 text-white">Add Teacher</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="../../Controller/addDptHdTcrCtrl.php"
                                          method="post"
                                          novalidate="novalidate">
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-username">Username
                                                        <span
                                                                class="text-danger">*</span></label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control" id="val-username"
                                                               name="name"
                                                               placeholder="Enter a username..">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-email">Email <span
                                                                class="text-danger">*</span></label>
                                                    <div class="col-lg-7">
                                                        <input type="email" class="form-control" id="val-email"
                                                               name="email"
                                                               placeholder="Your valid email..">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-phoneus">Phone <span
                                                                class="text-danger">*</span></label>
                                                    <div class="col-lg-7">
                                                        <input type="text" class="form-control" id="val-phoneus"
                                                               name="mobile"
                                                               placeholder="+88 01******">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-info">Description
                                                        <span
                                                                class="text-danger">*</span></label>
                                                    <div class="col-lg-7">
                                                <textarea type="text" class="form-control" style="height: 70px"
                                                          id="val-info" name="info" placeholder="Your info.."
                                                          rows="9"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="val-skill">Department
                                                        <span
                                                                class="text-danger">*</span></label>
                                                    <div class="col-lg-7">
                                                        <select class="form-control" id="skill" name="dpt_id">
                                                            <option value="">Please select Department</option>

                                                            <?php
                                                            foreach ($alldpt as $onedpt) {
                                                                ?>
                                                                <option value="<?php echo $onedpt['id'] ?>"><?php echo $onedpt['dpt_name'] ?></option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 col-sm-12">
                                                <div class="form-group row">
                                                    <div class="col-lg-8 ml-auto">
                                                        <button type="submit" class="btn btn-success btn sweet-success">
                                                            Submit
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin-top: -15px">
                    <div class="col-lg-12">
                        <div class="card  card-outline-primary">
                            <h4 class="m-b-0">All Head Teacher</h4>

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
                                        foreach ($all_hd as $item) {
                                            $serial++ ?>
                                            <tr>
                                                <th scope="row"><?php echo $serial ?></th>
                                                <td><?php echo $item['name'] ?></td>
                                                <td><?php echo $item['dpt_name'] ?></td>
                                                <td><?php echo $item['mobile'] ?></td>
                                                <td><?php echo $item['email'] ?></td>
                                                <td><?php echo $item['info'] ?></td>
                                                <td style="width: 100px">
                                                    <button value="<?php echo $item['id'] ?>" onclick="get_id(this)"
                                                            class="btn btn-circle btn-outline-primary"
                                                            data-toggle="modal"
                                                            data-target="#editModal"><i
                                                                class="fa fa-pencil" style="font-size: large"></i>
                                                    </button>
                                                    <button value="<?php echo $item['id'] ?>" onclick="del_id(this)"
                                                            class="btn btn-circle btn-outline-danger"
                                                            data-toggle="modal"
                                                            data-target="#delModal"><i
                                                                class="fa fa-trash-o" style="font-size: large"></i>
                                                    </button>
                                                </td>
                                            </tr>
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

    <div id="editModal" class="modal fade"
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
                    <form action="../../Controller/addDptHdTcrCtrl.php"
                          method="post">
                        <input name="id" id="u_id" type="hidden">
                        <div class="form-group">
                            <label class="col-form-label" for="val-username">Name</label>
                            <input type="text" id="u_name"
                                   value=""
                                   class="form-control"
                                   name="u_name">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label" for="val-phoneus">Mobile</label>
                            <input type="text"
                                   value=""
                                   class="form-control" id="u_mobile"
                                   name="u_mobile">
                        </div>
                        <div class="form-group">
                            <label class="col-form-label"
                                   for="val-info">Info</label>
                            <textarea type="text" class="form-control"
                                      id="u_info" name="u_info"
                                      style="padding-bottom: 70px"></textarea>
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
    <div id="delModal" class="modal fade"
         role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <form action="../../Controller/addDptHdTcrCtrl.php" method="post">
                    <input type="hidden" name="del_id" id="del_id">
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
                                class="btn btn-primary btn btn-rounded m-b-10 m-l-5">YES</a>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Wrapper -->
    <?php include_once 'template_lay/script.php' ?>
    <script>
        <?php
        if (isset($_SESSION['msg']) && $_SESSION['msg'] === 1) {
            echo "swal(\"Success\", \"New Teacher Added Successful\", \"success\");";
            $_SESSION['msg'] = 0;
        } ?>

        function get_id(e) {
            var id = e.value;
            var rowNUm = e.parentNode.parentNode.rowIndex;
            document.getElementById("u_id").value = id;
            document.getElementById("u_name").value = document.getElementById("myTable").rows[rowNUm].cells[1].innerHTML;
            document.getElementById("u_mobile").value = document.getElementById("myTable").rows[rowNUm].cells[3].innerHTML;
            document.getElementById("u_info").value = document.getElementById("myTable").rows[rowNUm].cells[5].innerHTML;
        }
        function del_id(e) {
            var id = e.value;
            document.getElementById("del_id").value = id;
        }
    </script>
    </body>
    </html>
    <?php
} else {
    header('Location:../../index.php');
} ?>