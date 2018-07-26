<div class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>

                <li> <a href="<?php echo base_url?>view/teacher/index.php" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Dashboard</span></a></li>


                <li> <a href="<?php echo base_url?>view/teacher/studentLookup.php" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Batch</span></a>
                </li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Attendance</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/teacher/assaignedBatch.php">Attendance</a></li>
                        <li><a href="<?php echo base_url?>view/teacher/attendMastr.php">Show Attendance</a></li>
                    </ul>
                </li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Resource</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/teacher/lecture.php">Upload Lecture</a></li>
                        <li><a href="<?php echo base_url?>view/teacher/Alllecture.php">Show Lecture</a></li>
                    </ul>
                </li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-bell"></i><span class="hide-menu">Teacher Notice</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/teacher/addNotic.php">Upload Notice</a></li>
                        <li><a href="<?php echo base_url?>view/teacher/showNotice.php">Show Notice</a></li>
                    </ul>
                </li>


                <li> <a href="<?php echo base_url?>view/teacher/adminNotice.php" aria-expanded="false"><i class="fa fa-bell"></i><span class="hide-menu">Admin Notice</span></a></li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-database"></i><span class="hide-menu">Assignment</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/teacher/Allassignment.php">Pending Assignment</a></li>
                        <li><a href="<?php echo base_url?>view/teacher/acceptedAllassignment.php">Accepted Assignment</a></li>
                    </ul>
                </li>


                <li> <a class="has-arrow  " href="#" aria-expanded="false"><i class="fa fa-book"></i><span class="hide-menu">Result</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="<?php echo base_url?>view/teacher/createResult.php">Upload Result</a></li>
                        <li><a href="<?php echo base_url?>view/teacher/resultList.php">Show Result</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</div>
<!-- End Left Sidebar  -->