<?php
session_start();
include_once "../Model/Sendmail.php";

include_once "../Model/Forgotpass.php";
$obj=new Forgotpass();
if (array_key_exists("role",$_POST)){
    $_SESSION['role']=$_POST['role'];
}

//check email
if (isset($_POST['email'])){

    if ($_POST['role']=='Dpt_Head'){
        //tch data
        $headdatamatch=$obj->checkheadID($_POST['email']);
        $_SESSION['username']=$headdatamatch['name'];
        $_SESSION['email']=$headdatamatch['email'];


        $obj=new Mail();
        $obj->oldpass($headdatamatch['email'],$headdatamatch['pass']);

        header('Location:../oldpass.php');

    }
    elseif ($_POST['role']=='Admin'){
        //tch data
        $admindatamatch=$obj->checkadminID($_POST['email']);
        $_SESSION['username']=$admindatamatch['name'];
        $_SESSION['email']=$admindatamatch['email'];
        $_SESSION['role']=$_POST['role'];

        $obj=new Mail();
        $obj->oldpass($admindatamatch['email'],$admindatamatch['pass']);
        header('Location:../oldpass.php');

    }
    elseif ($_POST['role']=='Teacher'){
        $datamatch=$obj->checkID($_POST['email']);
        //tch data
        $_SESSION['username']=$datamatch['name'];
        $_SESSION['email']=$datamatch['email'];
        $_SESSION['role']=$_POST['role'];
        $obj=new Mail();
        $obj->oldpass($datamatch['email'],$datamatch['pass']);
        $_SESSION['role']=$_POST['role'];

        header('Location:../oldpass.php');

    }
    elseif ($_POST['role']=='Student'){
        $stddatamatch=$obj->stdcheckID($_POST['email']);
        //std data
        $_SESSION['username']=$stddatamatch['name'];
        $_SESSION['email']=$stddatamatch['email'];
        $_SESSION['role']=$_POST['role'];
        $obj=new Mail();
        $obj->oldpass($stddatamatch['email'],$stddatamatch['pass']);

        header('Location:../oldpass.php');

    }
    else{
        header('Location:../forgotpass.php');
    }
}

//check password
if ($_SESSION['role']=="Dpt_Head"){
    if (isset($_POST['pass'])){
        $headdatamatch=$obj->checkpass($_POST['pass'],$_SESSION['email']);
        if ($headdatamatch!=null){
            //tch data
            $_SESSION['username']=$headdatamatch['name'];
            $_SESSION['email']=$headdatamatch['email'];

            header('Location:../setpassword.php');
        }
    }
}
elseif ($_SESSION['role']=="Teacher"){
    if (isset($_POST['pass'])){
        $datamatch=$obj->checktchpass($_POST['pass'],$_SESSION['email']);
        if ($datamatch!=null){
            //tch data
            $_SESSION['username']=$datamatch['name'];
            $_SESSION['email']=$datamatch['email'];

            header('Location:../setpassword.php');
        }
    }
}
elseif ($_SESSION['role']=="Student"){
    if (isset($_POST['pass'])){
        $stddatamatch=$obj->stdpass($_POST['pass'],$_SESSION['email']);
        if ($stddatamatch!=null){
            //std data
            $_SESSION['username']=$stddatamatch['name'];
            $_SESSION['email']=$stddatamatch['email'];

            header('Location:../setpassword.php');
        }
    }
}
elseif ($_SESSION['role']=="Admin"){
    if (isset($_POST['pass'])){
        $admincheckpass=$obj->checkadminpass($_POST['pass'],$_SESSION['email']);
        if ($admincheckpass!=null){
            //tch data
            $_SESSION['username']=$admincheckpass['name'];
            $_SESSION['email']=$admincheckpass['email'];

            header('Location:../setpassword.php');
        }
    }
}
else{
    header('Location:../oldpass.php');
}
/*if (isset($_POST['pass'])){
    $headdatamatch=$obj->checkpass($_POST['pass'],$_SESSION['email']);
    $datamatch=$obj->checktchpass($_POST['pass'],$_SESSION['email']);
    $stddatamatch=$obj->stdpass($_POST['pass'],$_SESSION['email']);
    $admincheckpass=$obj->checkadminpass($_POST['pass'],$_SESSION['email']);

    if ($headdatamatch!=null){
        //tch data
        $_SESSION['username']=$headdatamatch['name'];
        $_SESSION['email']=$headdatamatch['email'];

        header('Location:../setpassword.php');
    }
    elseif ($admincheckpass!=null){
        //tch data
        $_SESSION['username']=$admincheckpass['name'];
        $_SESSION['email']=$admincheckpass['email'];

        header('Location:../setpassword.php');
    }
    elseif ($datamatch!=null){
        //tch data
        $_SESSION['username']=$datamatch['name'];
        $_SESSION['email']=$datamatch['email'];

        header('Location:../setpassword.php');
    }
    elseif ($stddatamatch!=null){
        //std data
        $_SESSION['username']=$stddatamatch['name'];
        $_SESSION['email']=$stddatamatch['email'];

        header('Location:../setpassword.php');
    }
    else{
        header('Location:../oldpass.php');
    }
}*/



?>