<?php
include_once "Dbconnection.php";

class Batch{
    public function store($dpt_id,$batch){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "INSERT INTO `batch`(`dpt_id`,`batch_name`) VALUES (?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$dpt_id);
        $conn->bindParam(2,$batch);
        $conn->execute();

    }

    public function show(){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `batch`";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all=$conn->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function showBatchByDpt($id){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `batch` WHERE `dpt_id`='$id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all=$conn->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function updateBatch($id,$batch){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "UPDATE `batch` SET `batch_name`='$batch' WHERE `id`='$id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
    }
    public function deleteBatch($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `batch` WHERE id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
    }

}