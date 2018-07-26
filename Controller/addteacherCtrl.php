<?php
session_start();
include_once "../Model/addteacher.php";
include_once "../Model/Sendmail.php";
$obj=new addteacher();


if(isset($_POST['dpt_id'],$_POST['info'])){
    $mailcheck=$obj->mailcheck($_POST['email']);
    if ($mailcheck==true){
        $_POST['pass']=md5(123);
        $_POST['teacher_id']='LEC'.time();
        $obj->teacherinfoInsert($_POST);
        $obj->statusupdate($_POST['email']);
        $objm=new Mail();
        $objm->sendmail($_POST['email'],$_POST['teacher_id']);
        $_SESSION['msg'] =1;
        header('Location:../view/admin/addteacher.php');
    }
    else{
        header('Location:../view/admin/addteacher.php');
    }
}
elseif(isset($_POST['Info'])){
    $obj->editteacherinfo($_POST,$_GET['tech_id']);
    $dpt_id=$_GET['dpt_id'];
    $_SESSION['msg'] =1;
    header('Location:../view/admin/all_teacher.php?dpt_id='.$dpt_id);
}
elseif(isset($_GET['tech_id'])){
    $obj->delteacherinfo($_GET['tech_id']);
    $dpt_id=$_GET['dpt_id'];
    header('Location:../view/admin/all_teacher.php?dpt_id='.$dpt_id);
}
?>