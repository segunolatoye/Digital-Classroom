<?php
session_start();
include_once "../Model/AddSubject.php";
$obj = new AddSubject();

if (array_key_exists('id',$_GET)){
    $obj->updateSubject($_GET['id'],$_POST['sub_name']);
    $dpt_id=$_GET['dpt_id'];
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/showSubject.php?dpt_id=$dpt_id");
}
elseif (array_key_exists('sub_id',$_GET)){
    $obj->delete($_GET['sub_id']);
    $dpt_id=$_GET['dpt_id'];
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/showSubject.php?dpt_id=$dpt_id");
}
else{
    $obj->storeSubject($_POST['dpt_id'],$_POST['subject']);
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/addSubject.php");
}
?>