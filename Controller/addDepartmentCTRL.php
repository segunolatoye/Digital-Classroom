<?php

include_once "../Model/Department.php";

$obj = new Department();

if(isset($_POST['department'])){
    $obj->addDpt($_POST['department']);
    $_SESSION['msg'] = 1;
    header("Location: ../view/admin/addDepartment.php");
}
elseif (array_key_exists('id',$_GET)){
    $obj->updateDpt($_GET['id'],$_POST['dpt_name']);
    $_SESSION['msg'] = 1;
    header("Location: ../view/admin/addDepartment.php");
}
elseif (array_key_exists('dpt_id',$_GET)){
    $obj->delDpt($_GET['dpt_id']);
    $_SESSION['msg'] = 1;
    header("Location: ../view/admin/addDepartment.php");
}
