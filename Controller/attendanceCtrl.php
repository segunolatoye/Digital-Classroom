<?php
/**
 * Created by PhpStorm.
 * User: Arif
 * Date: 4/14/2018
 * Time: 3:37 PM
 */
include_once "../url.php";
include_once "../Model/attendance.php";

$obj=new attendance();

try {
    $presnt = 0;
    foreach ($_POST['value'] as $val) {
        if ($val['Attend'] == "1") {
            $presnt++;
        }
    }
    //print_r($presnt);
    $absent = $_POST['count'] - $presnt;
    //print_r($absent);
    $_POST['present'] = $presnt;
    $_POST['absent'] = $absent;//print_r($_POST);
    $obj->storeAtndMastr($_POST);
    $rs = $obj->last_id_of_atnd_master();
    $lastID = $rs->id;
    foreach ($_POST['value'] as $val) {
        $obj->storeAtndDetals($lastID, $val['id'], (int)$val['Attend']);
    }
    echo "success";
} catch (Exception $e) {
}

