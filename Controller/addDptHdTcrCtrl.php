<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 5/1/2018
 * Time: 5:36 PM
 */
//echo "<pre>";
//print_r($_SERVER['HTTP_REFERER']);

session_start();
include_once "../Model/DptHeadTcr.php";
include_once "../Model/Sendmail.php";
$obj=new DptHeadTcr();

if(isset($_POST['name'])){
    try {
        $_POST['pass'] = md5(123);
        $_POST['teacher_id'] = 'DH' . time();
        $obj->insert($_POST);
        $objm = new Mail();
        $objm->sendmail($_POST['email'], $_POST['teacher_id']);
        $_SESSION['msg'] = 1;
        header('Location:' . $_SERVER['HTTP_REFERER']);
    } catch (Exception $e) {
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}
elseif (isset($_POST['u_name'])){
    try {
        $obj->update($_POST);
        $_SESSION['msg'] = 1;
        header('Location:' . $_SERVER['HTTP_REFERER']);
    } catch (Exception $e) {
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}
elseif (isset($_POST['del_id'])){
    try {
        $obj->delete($_POST);
        $_SESSION['msg'] = 1;
        header('Location:' . $_SERVER['HTTP_REFERER']);
    } catch (Exception $e) {
        header('Location:' . $_SERVER['HTTP_REFERER']);
    }
}
else{
    $_SESSION['msg'] = 2;
    header('Location:' . $_SERVER['HTTP_REFERER']);
}
