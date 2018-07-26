<?php


include_once "../Model/Notic.php";
include_once "../Model/Notifications.php";

$obj = new Notic();

$obj->storeNotic($_POST);

$nt = new Notifications();
$notify_id="Notice";

$message= "You have a Notice";
$nt->store($notify_id,$message,$_POST['batch_id'],$_POST['dpt_id']);


header("Location: ../View/teacher/addNotic.php");


