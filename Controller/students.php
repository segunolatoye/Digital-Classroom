<?php

include_once "../Model/students.php";
$obj = new students();
session_start();
if (isset($_POST['u_name'])) {

    try {
        $obj->updateStdInfo($_POST);
        $_SESSION['msg']=1;
        header('Location:../view/admin/student_details.php?id='.$_POST['master_id']);
    } catch (Exception $e) {
        $_SESSION['msg']=2;
        header('Location:../view/admin/student_details.php?id='.$_POST['master_id']);
    }
}

if (isset($_POST['del_id'])) {

    try {
        $obj->delStudent($_POST);
        $_SESSION['msg']=1;
        header('Location:../view/admin/student_details.php?id='.$_POST['master_id']);
    } catch (Exception $e) {
        $_SESSION['msg']=2;
        header('Location:../view/admin/student_details.php?id='.$_POST['master_id']);
    }
}

if (isset($_POST['del_master_id'])) {

    try {
        $obj->delStdByMaster($_POST);
        $obj->delMaster($_POST);
        $_SESSION['msg']=3;
        header('Location:../view/admin/student_add.php');
    } catch (Exception $e) {
        $_SESSION['msg']=2;
        header('Location:../view/admin/student_add.php');
    }
}