<?php
if (!isset($_SESSION)) session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Admin.php";
    $ad = new Admin();
    $all = $ad->getAllById($_SESSION['id']);
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
                    <h3 class="text-primary">Dashboard</h3></div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->
            <div class="container-fluid">
                <!-- Start Page Content -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-two">
                                    <header>
                                        <div class="avatar">
                                            <img src="<?php echo base_url?>Resource/images/users/5.jpg"
                                                 alt="<?php echo $all['name']; ?>"/>
                                        </div>
                                    </header>

                                    <h3><?php echo $all['name']; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <!-- Column -->
                    <div class="col-lg-12">
                        <div class="card">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs profile-tab" role="tablist">
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#profile" role="tab">Profile</a>
                                </li>
                                <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#settings" role="tab">Settings</a>
                                </li>
                            </ul>
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <!--second tab-->
                                <div class="tab-pane" id="profile" role="tabpanel">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6 b-r"><strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $all['name'] ?></p>
                                            </div>
                                            <div class="col-md-6 col-xs-6 b-r"><strong>Position</strong>
                                                <br>
                                                <p class="text-muted">Admin</p>
                                            </div>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material"
                                              action="../../Controller/adminUpdateCtrl.php" method="post">
                                            <div class="form-group">
                                                <label class="col-md-12 ">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="name" name="name"
                                                           value="<?php echo $all['name'] ?>"
                                                           class="form-control form-control-line" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12 ">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="<?php echo $all['email'] ?>"
                                                           class="form-control form-control-line" name="email"
                                                           id="email" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn btn-success btn-rounded" id="update"
                                                           name="update" value="Update" hidden>
                                                    <!--                                                <input type="submit" class="btn btn-danger btn-rounded" id="cancel" name="cancel" value="cancel" hidden>-->
                                                </div>
                                            </div>
                                        </form>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-info btn-rounded" id="edit"
                                                       name="edit" value="Edit">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <input type="submit" class="btn btn-danger btn-rounded" id="cancel"
                                                       name="cancel" value="Cancel" hidden>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>

                <!-- End PAge Content -->
            </div>
            <!-- End Container fluid  -->
            <!-- footer -->
            <?php require_once "../template_layout/footer.php" ?>
            <!-- End footer -->
        </div>
    </div>
    <!-- End Wrapper -->
    <?php include_once 'template_lay/script.php' ?>

    <script>
        $(document).ready(function () {

            $('#edit').click(function () {
                $('.hidden_lb').removeAttr('hidden');
                $('#name').removeAttr('disabled');
                $('#update').removeAttr('hidden');
                $('#cancel').removeAttr('hidden');
                $("#edit").attr("hidden", "true");
            });
            $('#cancel').click(function () {
                $('#name').attr('disabled',true);
                $('#photolb').attr('hidden',true);
                $('#update').attr('hidden',true);
                $('#edit').attr('hidden',false);
                $('#cancel').attr('hidden',true);
            });
//        $('#update').click(function () {
//            var name=$('#name').val();
//            var email=$('#email').val();
//            var number=$('#number').val();
//            var info=$('#info').val();
//            if(name != '' && number!='' && info!='')
//            {
//                $.ajax({
//                    url : "../../Controller/teacherUpdateCtrl.php",
//                    method:"POST",
//                    data:{name:name,number:number,info:info,email:email}, //Send data to server
//                    success:function(data){
//                        alert(data);
//                    }
//                });
//            }
//            else
//            {
//                alert("all Fields are Required");
//            }
//
//        });


        });
    </script>


    </body>

    </html>
    <?php
}else{
    header('Location:../../index.php');
}?>