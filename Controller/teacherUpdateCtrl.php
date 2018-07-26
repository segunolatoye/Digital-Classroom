<?php
if (!isset($_SESSION)) session_start();
include_once "../Model/Login.php";
$log=new Login();

include_once "../Model/Forgotpass.php";
$fg = new Forgotpass();

include_once "../Model/addteacher.php";
$tea=new addteacher();
$allteac=$tea->getAllById($_SESSION['id']);

if ($_POST['c_pass']){
    $pass=md5($_POST['c_pass']);
    $permission=$log->teacherlog($allteac['email'],$pass);
    if ($permission!=null){
        header("Location:../view/teacher/changePass2.php");
    }
    else{
        header("Location:../view/teacher/changePass1.php");
    }
}
elseif ($_POST['pass_1']){
    $password=md5($_POST['pass_1']);
    $fg->setpass($password,$allteac['email']);
    header('Location:../index.php');
}
else{
    if (isset($_FILES['photo']['name'])){
        $picture=$_FILES['photo'];
    }

    if (isset($_FILES['photo']['name'])){
        $pic=time().$_FILES['photo']['name'];
        $prsent_location=$_FILES['photo']['tmp_name'];
        move_uploaded_file($prsent_location,'../upload/image/'.$pic);
        $_POST['pic_name']=$pic;
    }

    if ($picture['name']==""){
        $_POST['pic_name']=$allteac['photo'];

    }
    $tea->updateTeacherProfile($_POST,$_SESSION['id']);
    header("Location:../View/teacher/profile.php");
}
