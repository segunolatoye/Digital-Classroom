<?php
include_once "Dbconnection.php";

class Login
{
    //Head Of the Department
    public function dptheadlog($email,$pass){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `head_of_the_dpt` WHERE `email`=? AND `pass`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$email);
        $prepared->bindParam(2,$pass);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //teacher Login
    public function teacherlog($email,$pass){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `teachers` WHERE `email`=? AND `pass`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$email);
        $prepared->bindParam(2,$pass);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    //Student Login
    public function studentlog($email,$pass){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `students_details` WHERE `email`=? AND `pass`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$email);
        $prepared->bindParam(2,$pass);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function adminlog($email,$pass){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `admin` WHERE `email`=? AND `pass`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$email);
        $prepared->bindParam(2,$pass);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}