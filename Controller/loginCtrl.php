<?php
session_start();
include_once "../Model/Login.php";
$obj=new Login();

if(isset($_POST['email'],$_POST['pass'])){
    $password=md5($_POST['pass']);
    $datamatch=$obj->dptheadlog($_POST['email'],$password);
    $tchdatamatch=$obj->teacherlog($_POST['email'],$password);
    $stddatamatch=$obj->studentlog($_POST['email'],$password);
    $admindatamatch=$obj->adminlog($_POST['email'],$password);

    if($_POST['role']=='Dpt_Head'){
        if ($datamatch!=null){
            $_SESSION['id']=$datamatch['id'];
            $_SESSION['dpt_id']=$datamatch['dpt_id'];
            header('Location:../view/head_of_the_dpt/index.php');
        }
        else{
            header('Location:../index.php');
        }
    }
    elseif ($_POST['role']=='Teacher'){
        if ($tchdatamatch!=null){
            //Teacher login Data
        $_SESSION['id']=$tchdatamatch['id'];
        $_SESSION['name']=$tchdatamatch['name'];
        $_SESSION['teacher_id']=$tchdatamatch['teacher_id'];
        $_SESSION['email']=$tchdatamatch['email'];
        header('Location:../view/teacher/index.php');
        }
        else{
            header('Location:../index.php');
        }
    }
    elseif ($_POST['role']=='Student'){
        if ($stddatamatch!=null){
            //Student login Data
            $_SESSION['id']=$stddatamatch['id'];
            $_SESSION['name']=$stddatamatch['name'];
            $_SESSION['student_id']=$stddatamatch['student_id'];
            $_SESSION['student_batch']=$stddatamatch['batch_id'];
            $_SESSION['student_dpt']=$stddatamatch['dpt_id'];
            $_SESSION['email']=$stddatamatch['email'];
            header('Location:../view/student/index.php');
        }
        else{
            header('Location:../index.php');
        }
    }
    elseif($_POST['role']=='Admin'){
        if ($admindatamatch!=null){
            $_SESSION['id']=$admindatamatch['id'];
            header('Location:../view/admin/index.php');
        }
        else{
            header('Location:../index.php');
        }
    }

}

?>