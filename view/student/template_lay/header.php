<?php

if (!isset($_SESSION)) session_start();

$objnot= new Notifications();
$all=$objnot->showNotificationsforAll($_SESSION['student_batch'],$_SESSION['student_dpt']);
?>

<div class="header">
    <nav class="navbar top-navbar navbar-expand-md navbar-light">
        <!-- Logo -->
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo base_url?>view/student/index.php">
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
                <!-- <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li> -->
            </ul>
            <!-- User profile-->
            <ul class="navbar-nav my-lg-0">
                <!-- Comment -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                        <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                        <ul>
                            <li>
                                <div class="drop-title">Notifications</div>
                            </li>
                            <li>
                                <div class="message-center">
                                    <?php if ($all == false){?>
                                        <p>No Notifications Here..</p>
                                    <!-- Message -->
                                    <?php } else{ foreach ($all as $one){ $time = $objnot->get_time_ago($one->time);
                                        ?>

                                        <a href="
                                            <?php if ($one->notify_id=="Notice"){?>
                                                <?php echo base_url?>view/student/showNotice.php?id=<?php echo $one->id?>
                                            <?php } elseif ($one->notify_id=="result"){?>
                                            <?php echo base_url?>view/student/resultList.php?id=<?php echo $one->id?>
                                            <?php }?>
                                            ">
                                            <div class="btn btn-danger btn-circle m-r-10"><i class="fa fa-link"></i></div>
                                            <div class="mail-contnet">
                                                <h5><?php echo $one->message?></h5> <span class="time"><?php echo $time?></span>
                                            </div>
                                        </a>
                                    <?php }?>
                                    <?php }?>
                                </div>
                            </li>
                            <li>
                                <a class="nav-link text-center" href="javascript:void(0);"> <strong>Check all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                    </div>
                </li>
                <!-- End Comment -->
                <!-- Profile -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?=  base_url?>upload/image/<?= $allStudent['photo']==null ? '5.png' : $allStudent['photo'] ?>" alt="user" class="profile-pic" /></a>
                    <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                        <ul class="dropdown-user">
                            <li><a href="<?php echo base_url?>view/student/profile.php"><i class="ti-user"></i> Profile</a></li>
                            <li><a href="<?php echo base_url?>view/student/changePass1.php"><i class="ti-lock"></i> Change Password</a></li>
                            <li><a href="<?php echo base_url?>Controller/logout.php"><i class="fa fa-power-off"></i> Logout</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</div>