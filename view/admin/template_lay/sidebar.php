<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>

                <li> <a href="<?php echo base_url?>view/admin/index.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>


                <li> <a  href="<?php echo base_url?>view/admin/addDptHdTcr.php" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Dpt Head</span></a></li>


                <li> <a  href="<?php echo base_url?>view/admin/addSession.php" aria-expanded="false"><i class="fa fa-star"></i><span class="hide-menu">Session</span></a></li>


                <li> <a  href="<?php echo base_url?>view/admin/addDepartment.php" aria-expanded="false"><i class="fa fa-star"></i><span class="hide-menu">Department</span></a></li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-star"></i><span class="hide-menu">Batch</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/admin/addBatch.php">Add Batch</a></li>
                        <li><a href="<?php echo base_url?>view/admin/showBatchByDpt.php">Show Batch</a></li>
                    </ul>
                </li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Teacher</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/admin/addteacher.php">Add Teacher</a></li>
                        <li><a href="<?php echo base_url?>view/admin/showTeacherByDpt.php">Show Teacher</a></li>
                    </ul>
                </li>


                <li> <a  href="<?php echo base_url?>view/admin/student_add.php" aria-expanded="false"><i class="fa fa-users"></i><span class="hide-menu">Student</span></a>
                </li>

                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Subject</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/admin/addSubject.php">Add Subject</a></li>
                        <li><a href="<?php echo base_url?>view/admin/showSubjectByDpt.php">Show Subject</a></li>
                        <li><a href="<?php echo base_url?>view/admin/assignTeacher.php">Assign Teacher</a></li>
                        <li><a href="<?php echo base_url?>view/admin/all_assignTch.php">Show Assign Teacher</a></li>
                    </ul>
                </li>
                <!--<li class="nav-label">Attendence</li>-->
                <!--<li> <a  href="<?php /*echo base_url*/?>view/admin/attendMastr.php" aria-expanded="false"><i class="fa fa-bookmark"></i><span class="hide-menu">Attendence</span></a></li>-->


                <li> <a  href="<?php echo base_url?>view/admin/resultList.php" aria-expanded="false"><i class="fa fa-bookmark"></i><span class="hide-menu">Result</span></a></li>


                <li> <a  href="<?php echo base_url?>view/admin/showNotice.php" aria-expanded="false"><i class="fa fa-bell"></i><span class="hide-menu">Teacher Notice</span></a></li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bell"></i><span class="hide-menu">Admin Notice</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/admin/addNotic.php">Add Notice</a></li>
                        <li><a href="<?php echo base_url?>view/admin/adminNotice.php">Show Notice</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->