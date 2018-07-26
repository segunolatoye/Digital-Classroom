<?php

include_once "Dbconnection.php";
class DptHeadTcr
{
    public function insert($data){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="INSERT INTO `head_of_the_dpt`(`name`, `teacher_id`, `email`, `pass`, `mobile`, `info`, `dpt_id`, `status`) VALUES (?,?,?,?,?,?,?,'0')";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$data['name']);
        $prepared->bindParam(2,$data['teacher_id']);
        $prepared->bindParam(3,$data['email']);
        $prepared->bindParam(4,$data['pass']);
        $prepared->bindParam(5,$data['mobile']);
        $prepared->bindParam(6,$data['info']);
        $prepared->bindParam(7,$data['dpt_id']);
        $prepared->execute();
    }

    public function all(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT a.id,a.name,a.teacher_id,a.email,a.pass,a.mobile,a.info,a.photo,a.status,b.dpt_name FROM `head_of_the_dpt` a,department b WHERE a.dpt_id=b.id";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
        return $prepared->fetchAll(PDO::FETCH_ASSOC);
    }
    public function update($data){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `head_of_the_dpt` SET `name`=?,`mobile`=?,`info`=? WHERE `id` = ?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$data['u_name']);
        $prepared->bindParam(2,$data['u_mobile']);
        $prepared->bindParam(3,$data['u_info']);
        $prepared->bindParam(4,$data['id']);
        $prepared->execute();
    }
    public function delete($data){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `head_of_the_dpt` WHERE `id` = ?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$data['del_id']);
        $prepared->execute();
    }
    public function alltcr($dpt_id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT batch.id,batch.dpt_id,batch.batch_name,department.dpt_name FROM batch,department
 WHERE department.id=batch.dpt_id AND  batch.`dpt_id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$dpt_id);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function allsub($tcr_id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT assign_tcr.subject_id,  subject.subject_name,teachers.name FROM subject,teachers,assign_tcr 
WHERE   subject.id=assign_tcr.subject_id AND teachers.id=assign_tcr.tcr_id AND assign_tcr.batch_id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$tcr_id);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function alllecsub($sub_id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT lecture_details.*, teachers.name FROM `lecture_details`, teachers WHERE lecture_details.sub_id='$sub_id' AND lecture_details.`uploader_id`= teachers.teacher_id";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$sub_id);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    public function alllecsubwisetchname($tch_id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `teachers` WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$tch_id);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function alllecture(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="select * from teachers";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function dptimg($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `head_of_the_dpt` WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
}