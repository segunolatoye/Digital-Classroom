<?php

include_once "../Model/attendance.php";


$obj = new attendance();
$obj->updateAttendence($_POST['attendance'],$_GET['master_id'],$_GET['id']);

$master_id = $_GET['master_id'];

header("Location:../view/teacher/attendDetails.php?mstrID=".$master_id);