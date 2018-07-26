<?php
if (!isset($_SESSION)) session_start();

include_once "../Model/Login.php";
$log=new Login();

include_once "../Model/Forgotpass.php";
$fg = new Forgotpass();


include_once "../Model/students.php";
$tea=new students();
$allStd=$tea->getAllById($_SESSION['id']);

if ($_POST['c_pass']){
//    $pass=$_POST['c_pass'];
    $pass=md5($_POST['c_pass']);
    $permission=$log->studentlog($allStd['email'],$pass);
    if ($permission!=null){
        header("Location:../view/student/changePass2.php");
    }
    else{
        header("Location:../view/student/changePass1.php");
    }
}
elseif ($_POST['pass_1']){
    $password=md5($_POST['pass_1']);
    $fg->stdsetpass($password,$allStd['email']);
    header('Location:../index.php');
}
else {
    if (isset($_FILES['photo']['name'])) {
        $picture = $_FILES['photo'];
    }
    if ($picture['name'] == "") {
//    if (isset($_FILES['photo'] ['name'])){
        $_POST['pic_name'] = $allStd['photo'];
    } else {
        $pic = time() . $_FILES['photo']['name'];
        $prsent_location = $_FILES['photo']['tmp_name'];
        move_uploaded_file($prsent_location, '../upload/image/' . $pic);
        $_POST['pic_name'] = $pic;
    }
    $tea->updateTeacherProfile($_POST['name'], $_POST['pic_name'], $allStd['id']);
    header("Location:../View/student/profile.php");
}