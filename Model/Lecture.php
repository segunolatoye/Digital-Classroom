<?php
include_once "Dbconnection.php";

class Lecture
{
    public function uploadlec($lec_info,$tch_id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="INSERT INTO `lecture_details`(`title`, `sub_id`, `lec_file`, `uploader_id`) VALUES (?,?,?,?)";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$lec_info['title']);
        $prepared->bindParam(2,$lec_info['sub_id']);
        $prepared->bindParam(3,$lec_info['lec_file']);
        $prepared->bindParam(4,$tch_id);
        $prepared->execute();
    }

    public function showsublec($lec_id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT a.id,a.title,
a.upload_time, 
b.name,
a.lec_file 
FROM lecture_details a,teachers b WHERE 
a.uploader_id=b.teacher_id AND a.sub_id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$lec_id);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function dellecture($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `lecture_details` WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
    }


    //    get all by uploader id
    public function getAllByUploaderId($uploaderId){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT a.`id`, a.`title`, a.`sub_id`,b.subject_name,a.`lec_file`, a.`uploader_id`,c.name, a.`upload_time`, a.`status` FROM `lecture_details` a, subject b,teachers c WHERE a.status=0 AND a.sub_id=b.id AND a.uploader_id=c.teacher_id AND a.`uploader_id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$uploaderId);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
//    news feed
    public function getAllBy(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT a.`id`, a.`title`, a.`sub_id`,b.subject_name,a.`lec_file`, a.`uploader_id`,c.name,c.photo, a.`upload_time`, a.`status` FROM `lecture_details` a, subject b,teachers c WHERE a.status=0 AND a.sub_id=b.id AND a.uploader_id=c.teacher_id AND a.status=0";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    //    count all lecture
    public function numberOfLecture(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT COUNT(id) FROM `lecture_details` WHERE status=0";
        $prepare=$conn->prepare($sql);
        $prepare->execute();
        $result=$prepare->fetch(PDO::FETCH_COLUMN);
        return $result;
    }
}