<?php
session_start();

use Box\Spout\Reader\ReaderFactory;
use Box\Spout\Common\Type;
require_once '../vendor/box/spout/src/Spout/Autoloader/autoload.php';
include_once "../Model/student_import.php";

try {
    $obj = new student_import();
    $obj->insert_std_details($_POST);
    $rs = $obj->last_id_of_std_batch();
    $id = $rs->id;
    $obj->insert($_FILES, $_POST, $id);
    $_SESSION['msg'] = 1;
    header('Location:../view/admin/student_add.php');
} catch (Exception $e) {
    $_SESSION['msg'] = 2;
    header('Location:../view/admin/student_add.php');
}




