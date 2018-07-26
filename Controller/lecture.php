<?php
session_start();
include_once "../Model/Lecture.php";
$obj=new Lecture();

if (isset($_FILES['lec_file']['name'])){

    $file_name=time().$_FILES['lec_file']['name'];
    $permanent_add=$_FILES['lec_file']['tmp_name'];
    move_uploaded_file($permanent_add,'../upload/'.$file_name);
    $_POST['lec_file']=$file_name;
}
if (isset($_POST['sub_id'])){
    $obj->uploadlec($_POST,$_SESSION['teacher_id']);
    $_SESSION['msg'] = 1;
    header('Location:../view/teacher/lecture.php');
}
if (isset($_GET['id'])){
    $obj->dellecture($_GET['id']);
    $sub_id=$_GET['sub_id'];
    $_SESSION['msg'] = 1;
    header('Location:../view/teacher/profile.php');
}

