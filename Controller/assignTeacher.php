<?php
session_start();
include_once "../Model/AssignTeacher.php";
$obj = new AssignTeacher();

if (isset($_POST['subject_id'])){
    $obj->store($_POST);
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/assignTeacher.php");
}
elseif(isset($_GET['assign_id'])){
    $obj->delAssigntch($_GET['assign_id']);
    header("Location: ../View/admin/all_assignTch.php");
}
