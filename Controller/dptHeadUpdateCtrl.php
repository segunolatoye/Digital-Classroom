<?php
session_start();
include_once "../Model/Login.php";
$log=new Login();

include_once "../Model/Forgotpass.php";
$fg = new Forgotpass();

include_once "../Model/DepartmentHead.php";
$d=new DepartmentHead();
$all=$d->getAllById($_SESSION['id']);

if ($_POST['c_pass']){

    $pass=md5($_POST['c_pass']);

    $permission=$log->dptheadlog($all['email'],$pass);

    if ($permission!=null){
        header("Location:../view/head_of_the_dpt/changePass2.php");
    }
}
elseif ($_POST['pass_1']){
    var_dump($all['email']);
    var_dump($_POST);

    $password=md5($_POST['pass_1']);
    $fg->updateheadpass($password,$all['email']);
    header('Location:../index.php');
}
else{
    $_POST['id']=$_SESSION['id'];

    if (isset($_FILES['photo']['name'])){
        $picture=$_FILES['photo'];
    }
    if (isset($_FILES['photo']['name'])){
        $pic=time().$_FILES['photo']['name'];
        $prsent_location=$_FILES['photo']['tmp_name'];
        move_uploaded_file($prsent_location,'../upload/image/'.$pic);
        $_POST['pic_name']=$pic;
    }
    if ($picture['name']==""){
        $_POST['pic_name']=$all['photo'];

    }
    $d->updateProfile($_POST);
    header("Location:../View/head_of_the_dpt/profile.php");

}