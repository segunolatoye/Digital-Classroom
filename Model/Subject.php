<?php
include_once "Dbconnection.php";

class Subject
{
    public function showSubject(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `subject`";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }
    public function showSubjectbydptid($id){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `subject` WHERE dpt_id=1";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }
}