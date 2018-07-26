<?php
if (!isset($_SESSION)) session_start();
if (isset($_SESSION['id'])) {
    include_once "../../url.php";
    include_once "../../Model/Notifications.php";
    include_once "../../Model/students.php";
    $std = new students();
    $allStudent = $std->getAllById($_SESSION['id']);
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
                                            <img src="<?php echo base_url ?>upload/image/<?php echo $allStudent['photo'] ?>"
                                                 alt="<?php echo $allStudent['name']; ?>"/>
                                        </div>
                                    </header>

                                    <h3><?php echo $allStudent['name']; ?></h3>
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
                                            <div class="col-md-2 col-xs-6 b-r"><strong>Full Name</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $allStudent['name'] ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6"><strong>Student Id</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $allStudent['student_id'] ?></p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 b-r"><strong>Department</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $allStudent['dpt_name'] ?></p>
                                            </div>
                                            <div class="col-md-2 col-xs-6 b-r"><strong>Session</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $allStudent['session_name'] ?></p>
                                            </div>
                                            <div class="col-md-2 col-xs-6 b-r"><strong>Batch</strong>
                                                <br>
                                                <p class="text-muted"><?php echo $allStudent['batch_name'] ?></p>
                                            </div>

                                        </div>
                                        <hr>

                                    </div>
                                </div>
                                <div class="tab-pane" id="settings" role="tabpanel">
                                    <div class="card-body">
                                        <form class="form-horizontal form-material"
                                              action="../../Controller/studentUpdateCtrl.php" method="post"
                                              enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label class="col-md-12 ">Full Name</label>
                                                <div class="col-md-12">
                                                    <input type="text" id="name" name="name"
                                                           value="<?php echo $allStudent['name'] ?>"
                                                           class="form-control form-control-line" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="example-email" class="col-md-12 ">Email</label>
                                                <div class="col-md-12">
                                                    <input type="email" value="<?php echo $allStudent['email'] ?>"
                                                           class="form-control form-control-line" name="email"
                                                           id="email" disabled>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label for="example-email" class="col-md-12 hidden_lb"
                                                           hidden>Photo</label>
                                                    <input type="file" class="form-control" style="width: 100%"
                                                           name="photo" id="photo" placeholder="photo"
                                                           value="<?php echo $allStudent['image'] ?>" hidden>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <input type="submit" class="btn btn-success btn-rounded" id="update"
                                                           name="update" value="Update Profile" hidden>
                                                    <!--                                                <input type="submit" class="btn btn-danger btn-rounded" id="cancel" name="cancel" value="cancel" hidden>-->
                                                </div>
                                            </div>
                                        </form>
                                        <div class="form-group">
                                            <div class="col-sm-12">
                                                <input type="submit" class="btn btn-info btn-rounded" id="edit"
                                                       name="edit" value="Edit Profile">
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
            <?php include_once "../template_layout/footer.php" ?>
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
                $('#number').removeAttr('disabled');
                $('#info').removeAttr('disabled');
                $('#photo').removeAttr('hidden');
//            $('#photo').val(image);
                $('#update').removeAttr('hidden');
//            $('#cancel').removeAttr('hidden');
                $("#edit").attr("hidden", "true");
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