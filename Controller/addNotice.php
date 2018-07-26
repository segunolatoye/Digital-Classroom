<?php
session_start();
/**
 * Created by PhpStorm.
 * User: SUKKUR
 * Date: 5/1/2018
 * Time: 3:09 PM
 */
include_once "../Model/adminNotice.php";

$obj=new adminNotice();

if (isset($_POST['title'],$_POST['notice'])){
    $obj->insertnoyice($_SESSION['id'],$_POST);
    $_SESSION['msg'] = 1;
    header('Location:../view/admin/addNotic.php');
}