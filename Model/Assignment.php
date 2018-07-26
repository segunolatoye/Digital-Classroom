<?php
/**
 * Created by PhpStorm.
 * User: SUKKUR
 * Date: 5/1/2018
 * Time: 5:10 PM
 */
include_once "Dbconnection.php";
class Assignment
{
    public function upassignment($id,$post){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="INSERT INTO `assignment`(`uploader_id`, `sub_id`, `title`, `resource`) VALUES (?,?,?,?)";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->bindParam(2,$post['sub_id']);
        $prepared->bindParam(3,$post['title']);
        $prepared->bindParam(4,$post['resource']);
        $prepared->execute();
    }
    public function showassignment($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT assignment.id,      assignment.uploader_id,
assignment.title,               assignment.resource,
assignment.time,          subject.subject_name,    students_details.name
FROM `assignment`,subject,students_details 
WHERE assignment.uploader_id=students_details.id     AND    assignment.sub_id=subject.id      AND   assignment.status=0   AND assignment.sub_id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showacceptassignment($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT assignment.id,      assignment.uploader_id,
assignment.title,               assignment.resource,
assignment.time,          subject.subject_name,    students_details.name
FROM `assignment`,subject,students_details 
WHERE assignment.uploader_id=students_details.id     AND    assignment.sub_id=subject.id      AND   assignment.status=1   AND assignment.sub_id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function acceptassignment($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `assignment` SET `status`=1 WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
    }
    public function delassignment($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `assignment` WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
    }
}