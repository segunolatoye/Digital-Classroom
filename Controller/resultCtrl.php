<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/14/2018
 * Time: 3:37 PM
 */
if (!isset($_SESSION)) session_start();
include_once "../Model/result.php";
include_once "../Model/Notifications.php";
include_once "../Model/rf_batch.php";
include_once "../Model/rf_department.php";

$obj = new result();

$bat = new rf_batch();
$dp = new rf_department();
//print_r($_POST);
if (isset($_POST['value'])) {
    try {
        $obj->storeRsltMastr($_POST);
        $rs = $obj->last_id_of_rslt_master();
        $lastID = $rs->id;
        foreach ($_POST['value'] as $val) {
            $obj->storeRsltDetails($lastID, $val['Name'], $val['ID'], $val['CT Marks'], $val['Assignment Marks'], $val['Mid Marks'], $val['Final Marks'], $val['Attendence Mark']);
        }
        echo "success";
    } catch (Exception $e) {
        echo $e;
    }
}

if (isset($_GET['pubId'])) {
    $obj->pubRslt($_GET['pubId']);
    $batc = $bat->BatchIDByName($_GET['batch']);
    $dptt = $dp->DptIDByName($_GET['dpt']);
    $batch=$batc->id;
    $dpt= $dptt->id;

    $objnot = new Notifications();
    $notify_id = "result";
    $message = "Your Final result has published";
    $objnot->store($notify_id, $message, $batch,$dpt);
    header('Location:../view/teacher/resultList.php');
}
if (isset($_GET['unpubId'])) {
    $obj->unpubRslt($_GET['unpubId']);
    header('Location:../view/teacher/resultList.php');
}
if (isset($_GET['delId'])) {
    $obj->delRslt($_GET['delId']);
    header('Location:../view/teacher/resultList.php');
}
if (isset($_POST['mid_mark'])) {
    //print_r($_POST);
    //echo $_GET['mstrID'];

    $obj->updateMark($_POST);
    header('Location:../view/teacher/resultDetailByID.php?mstrID=' . $_POST['master_id']);
}

