<?php
/**
 * Created by PhpStorm.
 * User: Fardin
 * Date: 5/8/2018
 * Time: 1:26 PM
 */

if (!isset($_SESSION)) session_start();

include_once "../Model/Login.php";
$log=new Login();

include_once "../Model/Forgotpass.php";
$fg = new Forgotpass();

include_once "../Model/Admin.php";
$ad = new Admin();
$all=$ad->getAllById($_SESSION['id']);


if (isset($_POST['name'])){
    $ad->updateAdminProfile($_POST['name'],$_SESSION['id']);
    header("Location:../view/admin/profile.php");
}
elseif ($_POST['c_pass']){
    $pass=md5($_POST['c_pass']);
    $permission=$log->adminlog($all['email'],$pass);
    if ($permission!=null){
        header("Location:../view/admin/changePass2.php");
    }
    else{
        header("Location:../view/admin/changePass1.php");
    }
}
elseif ($_POST['pass_1']){
    $password=md5($_POST['pass_1']);
    $fg->updateadminpass($password,$all['email']);
    header('Location:../index.php');
}

else{
    header("Location:../index.php");
}