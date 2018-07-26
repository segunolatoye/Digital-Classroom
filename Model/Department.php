<?php
include_once "Dbconnection.php";
class Department
{
    public function addDpt($post){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "INSERT INTO `department`(`dpt_name`) VALUES (?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$post);
        $conn->execute();
    }

    public function showDepartment(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `department`";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all =$conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }

    public function updateDpt($id,$dpt_name){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "UPDATE `department` SET `dpt_name`='$dpt_name' WHERE `id`='$id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
    }
    public function delDpt($id){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "DELETE FROM `department` WHERE `id`='$id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
    }

}