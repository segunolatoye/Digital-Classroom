<?php
/**
 * Created by PhpStorm.
 * User: Fardin
 * Date: 5/1/2018
 * Time: 5:54 PM
 */

include_once "Dbconnection.php";

class DepartmentHead{
    //    all from student by id
    public function getAllById($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT a.`id`, a.`name`, a.`teacher_id`, a.`email`, a.`pass`, a.`mobile`, a.`info`, a.`photo`, a.`dpt_id`,b.dpt_name FROM `head_of_the_dpt` a,department b WHERE a.`dpt_id`=b.id AND a.status=0 AND a.id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //    update name mobile and info by email
    public function updateProfile($tch){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `head_of_the_dpt` SET `name`=?,`mobile`=?,`info`=?,`photo`=? WHERE id=?";
        $prepare=$conn->prepare($sql);
        $prepare->bindParam(1,$tch['name']);
        $prepare->bindParam(2,$tch['number']);
        $prepare->bindParam(3,$tch['info']);
        $prepare->bindParam(4,$tch['pic_name']);
        $prepare->bindParam(5,$tch['id']);
        $prepare->execute();
    }
}