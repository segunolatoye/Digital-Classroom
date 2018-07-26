<?php
include_once "Dbconnection.php";

class Session{
    public function store($session){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "INSERT INTO `session`(`session_name`) VALUES (?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$session);
        $conn->execute();

    }

    public function show(){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `session`";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all=$conn->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function updateBatch($id, $session){
        $obj = new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "UPDATE `session` SET `session_name`='$session' WHERE `id`='$id'";
        $conn = $DBH->prepare($sql);
        $conn->execute();
    }
    public function delete($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `session` WHERE id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
    }

}