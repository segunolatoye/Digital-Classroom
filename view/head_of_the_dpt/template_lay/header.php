<?php
if (!isset($_SESSION)) session_start();
include_once "../../Model/DptHeadTcr.php";
$obj=new DptHeadTcr();
$alldata=$obj->dptimg($_SESSION['id']);

?>
<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url?>view/head_of_the_dpt/index.php">
                <!-- Logo icon -->
                <b><img src="<?php echo base_url?>Resource/images/logo.png" alt="homepage" class="dark-logo" /></b>
                <!--End Logo icon -->
                <!-- Logo text -->
                <span><img src="<?php echo base_url?>Resource/images/logo-text.png" alt="homepage" class="dark-logo" /></span>
            </a>
        </div>
        <!-- End Logo -->
        <div class="navbar-collapse">
            <!-- toggle and nav items -->
            <ul class="navbar-nav mr-auto mt-md-0">
                <!-- This is  -->
                <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
               <!--  <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li> -->
            </ul>
            <!-- User profile-->
            <ul class="navbar-nav my-lg-0">
                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo base_url?>upload/image/<?= $alldata['photo']==null ? '3.png' : $alldata['photo'] ?>" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li><a href="<?php echo base_url?>view/head_of_the_dpt/profile.php"><i class="ti-user"></i> Profile</a></li>
                            <li><a href="<?php echo base_url?>view/head_of_the_dpt/changePass1.php"><i class="ti-lock"></i> Change Password</a></li>
                            <li><a href="<?php echo base_url?>Controller/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>