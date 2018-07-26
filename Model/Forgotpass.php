<?php
include_once "Dbconnection.php";

class Forgotpass
{
    //Head_of_the_dpt Can change His Password
    public function checkheadID($email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `head_of_the_dpt` WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$email);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function checkpass($pass,$email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `head_of_the_dpt` WHERE `pass`=? AND email=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$pass);
        $prepared->bindParam(2,$email);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateheadpass($pass,$email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `head_of_the_dpt` SET `pass`=? WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$pass);
        $prepared->bindParam(2,$email);
        $prepared->execute();
    }
    //Admin
    public function checkadminID($email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `admin` WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$email);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function checkadminpass($pass,$email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `admin` WHERE `pass`=? AND email=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$pass);
        $prepared->bindParam(2,$email);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function updateadminpass($pass,$email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `admin` SET `pass`=? WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$pass);
        $prepared->bindParam(2,$email);
        $prepared->execute();
    }

    //teacher Can change His Password
    public function checkID($email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `teachers` WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$email);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function checktchpass($pass,$email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `teachers` WHERE `pass`=? AND email=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$pass);
        $prepared->bindParam(2,$email);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function setpass($pass,$email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `teachers` SET `pass`=? WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$pass);
        $prepared->bindParam(2,$email);
        $prepared->execute();
    }

    //student Can change His Password
    public function stdcheckID($email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `students_details` WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$email);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function stdpass($pass,$email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `students_details` WHERE `pass`=? AND email=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$pass);
        $prepared->bindParam(2,$email);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    public function stdsetpass($pass,$email){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `students_details` SET `pass`=? WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$pass);
        $prepared->bindParam(2,$email);
        $prepared->execute();
    }
}
