<?php
session_start();
include_once "../Model/Session.php";
$obj = new Session();

if (array_key_exists('id',$_GET)){
    $obj->updateBatch($_GET['id'],$_POST['session_name']);
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/addSession.php");
}
elseif (array_key_exists('s_id',$_GET)){
    $obj->delete($_GET['s_id']);
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/addSession.php");
}
else{
    $obj->store($_POST['session']);
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/addSession.php");
}
?>