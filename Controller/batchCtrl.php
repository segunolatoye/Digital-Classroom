<?php
session_start();
include_once "../Model/Batch.php";
$obj = new Batch();

if (array_key_exists('id',$_GET)){
    $obj->updateBatch($_GET['id'],$_POST['batch_name']);
    $dpt_id = $_GET['dpt_id'];
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/showBatch.php?dpt_id=$dpt_id");
}
elseif (array_key_exists('batch_id',$_GET)){
    $obj->deleteBatch($_GET['batch_id']);
    $dpt_id = $_GET['dpt_id'];
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/showBatch.php?dpt_id=$dpt_id");
}
else{
    $obj->store($_POST['dpt_id'],$_POST['batch']);
    $_SESSION['msg'] = 1;
    header("Location: ../View/admin/addBatch.php");
}
?>