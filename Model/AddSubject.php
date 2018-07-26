<?php

include_once "Dbconnection.php";

class AddSubject
{
    public function storeSubject($dpt_id,$subject_name){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "INSERT INTO `subject`(`dpt_id`,`subject_name`) VALUES (?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$dpt_id);
        $conn->bindParam(2,$subject_name);
        $conn->execute();

    }

    public function showSubject($dpt_id){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `subject` WHERE `dpt_id`='$dpt_id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all=$conn->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function updateSubject($id,$sub_name){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "UPDATE `subject` SET `subject_name`='$sub_name' WHERE `id`='$id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
    }
    public function delete($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `subject` WHERE id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
    }

}