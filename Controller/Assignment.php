<?php
session_start();
/**
 * Created by PhpStorm.
 * User: SUKKUR
 * Date: 5/1/2018
 * Time: 5:10 PM
 */
include_once "../Model/Assignment.php";

$obj=new Assignment();

if (isset($_FILES['resource']['name'])){

    $file_name=time().$_FILES['resource']['name'];
    $permanent_add=$_FILES['resource']['tmp_name'];
    move_uploaded_file($permanent_add,'../upload/'.$file_name);
    $_POST['resource']=$file_name;
}

if(isset($_POST['sub_id'],$_POST['resource'])){
    $obj->upassignment($_SESSION['id'],$_POST);
    header('Location:../view/student/Assignment.php');
}
elseif (isset($_GET['ass_id'])){
    $obj->acceptassignment($_GET['ass_id']);
    header('Location:../view/teacher/Showassignment.php?id='.$_SESSION['book_id']);
}
elseif (isset($_GET['assign_id'])){
    $obj->delassignment($_GET['assign_id']);
    header('Location:../view/teacher/Showassignment.php?id='.$_SESSION['book_id']);
}
elseif (isset($_GET['assignment_id'])){
    $obj->delassignment($_GET['assignment_id']);
    header('Location:../view/student/Showassignment.php?id='.$_SESSION['book_id']);
}