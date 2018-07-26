<?php

include_once '../Model/students.php';


$obj = new students();
$obj->updateStudent($_GET['std_id'],$_GET['ssn'],$_GET['d'],$_GET['b']);

header("Location: ../view/teacher/std_details.php?s=".$_GET['s']."&d=".$_GET['d']."&b=".$_GET['b']."&ssn=".$_GET['ssn']);