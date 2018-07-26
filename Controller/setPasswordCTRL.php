<?php
if (!isset($_SESSION)) session_start();

include_once "../Model/Forgotpass.php";
//
//var_dump($_SESSION);
//var_dump($_POST);
$obj = new Forgotpass();

if ($_SESSION['role']=="Dpt_Head"){
    $password = md5($_POST['password']);
    $obj->updateheadpass($password,$_SESSION['email']);
    header("Location: ../index.php");
}
elseif ($_SESSION['role']=="Teacher"){
    $password=md5($_POST['password']);
    $obj->setpass($password,$_SESSION['email']);
    header('Location:../index.php');
}
elseif ($_SESSION['role']=="Student"){
    $password=md5($_POST['password']);
    $obj->stdsetpass($password,$_SESSION['email']);
    header('Location:../index.php');
}
elseif ($_SESSION['role']=="Admin"){
    $password=md5($_POST['password']);
    $obj->updateadminpass($password,$_SESSION['email']);
    header('Location:../index.php');
}