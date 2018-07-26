<?php


include_once "Dbconnection.php";

class AssignTeacher{
    public function getTcrID($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="Select tcr_id FROM `assign_tcr` WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
        return $prepared->fetch(pdo::FETCH_OBJ);
    }

    public function del_atnd_by_tcr($tcr_id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `attendence_master` WHERE `tcr_id`= ?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$tcr_id);
        $prepared->execute();
    }

    public function store($post){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();
        $sql = "INSERT INTO `assign_tcr`(`tcr_id`, `dpt_id`, `session_id`, `batch_id`, `subject_id`,`over_valid`) VALUES (?,?,?,?,?,NOW() + Interval 120 DAY)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$post['teacher_id']);
        $conn->bindParam(2,$post['dpt_id']);
        $conn->bindParam(3,$post['session_id']);
        $conn->bindParam(4,$post['batch_id']);
        $conn->bindParam(5,$post['subject_id']);
        $conn->execute();
    }

    public function all_assaign(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();
        $sql="SELECT * FROM `assign_tcr`";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
        return $prepared->fetchAll(pdo::FETCH_OBJ);
    }

    public function delete_over_valid($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();
        $sql="DELETE FROM `assign_tcr` WHERE id='$id'";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
    }

    //Assign Teacher By Subject
    public function allAssigntch(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT * FROM `assigntch_by_sub`";
        $prepared=$conn->prepare($sql);
        $prepared->execute();
        $result=$prepared->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //Delete Assign Teacher
    public function delAssigntch($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="DELETE FROM `assign_tcr` WHERE `id`=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
    }


    public function byTeacherId($tcr_id){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT assign_tcr.dpt_id,assign_tcr.session_id,assign_tcr.batch_id,assign_tcr.subject_id,session.session_name,batch.batch_name,subject.subject_name,department.dpt_name from session,batch,subject,department,assign_tcr WHERE assign_tcr.session_id=session.id AND assign_tcr.batch_id=batch.id AND assign_tcr.subject_id=subject.id AND assign_tcr.dpt_id=department.id AND assign_tcr.tcr_id= '$tcr_id'";
        $conn = $DBH->prepare($sql);

        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_ASSOC);
        return $all;
    }
    public function showSubject($tcr_id){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT subject.id,subject.subject_name FROM `assign_tcr`,subject WHERE assign_tcr.subject_id=subject.id AND assign_tcr.tcr_id=?";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$tcr_id);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_ASSOC);
        return $all;
    }
}