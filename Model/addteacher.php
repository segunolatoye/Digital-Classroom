<?php

include_once "Dbconnection.php";
class addteacher
{

    //Email Check
    public function mailcheck($mail){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `teachers` WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$mail);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_COLUMN);
        if ($result=='0'){
            return true;
        }
        else{
            return false;
        }
    }


    //Add Teachers By Head Of The Department
    public function teacherinfoInsert($teacher_info){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="INSERT INTO `teachers`( `name`, `teacher_id`, `email`, `pass`, `mobile`, `info`, `dpt_id`) VALUES (?,?,?,?,?,?,?)";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$teacher_info['name']);
        $prepared->bindParam(2,$teacher_info['teacher_id']);
        $prepared->bindParam(3,$teacher_info['email']);
        $prepared->bindParam(4,$teacher_info['pass']);
        $prepared->bindParam(5,$teacher_info['mobile']);
        $prepared->bindParam(6,$teacher_info['info']);
        $prepared->bindParam(7,$teacher_info['dpt_id']);
        $prepared->execute();
    }

    //Status Update
    public function statusupdate($teacher_info){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `teachers` SET `status`=1 WHERE `email`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$teacher_info);
        $prepared->execute();
    }

    //show teacher list by dpt id
    public function showteacher($dpt_id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT teachers.*,department.dpt_name FROM `teachers`,department WHERE teachers.dpt_id='$dpt_id' AND department.id='$dpt_id' ";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function showteacherList(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT teachers.*,department.dpt_name FROM `teachers`,department WHERE teachers.dpt_id=department.id";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //edit teacher info
    public function editteacherinfo($info,$id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `teachers` SET `name`=?,`mobile`=?,`info`=? WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$info['name']);
        $prepared->bindParam(2,$info['mobile']);
        $prepared->bindParam(3,$info['Info']);
        $prepared->bindParam(4,$id);
        $prepared->execute();
    }

    //delete teacher
    public function delteacherinfo($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `teachers` WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
    }

    //    all from teacher by id
    public function getAllById($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT a.`id`, a.`name`, a.`teacher_id`, a.`email`, a.`pass`, a.`mobile`, a.`info`, a.`photo`, a.`dpt_id`,b.dpt_name, a.`status` FROM `teachers` a, department b WHERE a.status=1 AND a.`dpt_id`=b.id AND a.id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    //    all from teacher by id
    public function getAllByTeacherId($teacherId){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT a.`id`, a.`name`, a.`teacher_id`, a.`email`, a.`pass`, a.`mobile`, a.`info`, a.`photo`, a.`dpt_id`,b.dpt_name, a.`status` FROM `teachers` a, department b WHERE a.status=0 AND a.`dpt_id`=b.id AND a.teacher_id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$teacherId);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
//    update name mobile and info by email
    public function updateTeacherProfile($tch,$id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `teachers` SET `name`=?,`mobile`=?,`info`=?,`photo`=? WHERE `id`=?";
        $prepare=$conn->prepare($sql);
        $prepare->bindParam(1,$tch['name']);
        $prepare->bindParam(2,$tch['number']);
        $prepare->bindParam(3,$tch['info']);
        $prepare->bindParam(4,$tch['pic_name']);
        $prepare->bindParam(5,$id);
        $prepare->execute();
    }
    //    count all teacher
    public function numberOfTeacher(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT COUNT(id) as allTeacher FROM teachers WHERE status=1";
        $prepare=$conn->prepare($sql);
        $prepare->execute();
        $result=$prepare->fetch(PDO::FETCH_COLUMN);
        return $result;
    }
}