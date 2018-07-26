<?php

include_once "Dbconnection.php";

class attendance
{

    public function storeAtndMastr($post)
    {
        $obj = new DbConnection();
        $DBH = $obj->dbConnect();

        $sql = "INSERT INTO `attendence_master`(`tcr_id`, `subject_id`, `batch_id`, `session_id`, `dpt_id`, `total_attendence`, `total_absence`) VALUES (?,?,?,?,?,?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1, $post['tcr_id']);
        $conn->bindParam(2, $post['sub_id']);
        $conn->bindParam(3, $post['batch_id']);
        $conn->bindParam(4, $post['session_id']);
        $conn->bindParam(5, $post['dpt_id']);
        $conn->bindParam(6, $post['present']);
        $conn->bindParam(7, $post['absent']);
        $conn->execute();
    }

    public function storeAtndDetals($mstrId, $stdId, $attend)
    {
        $obj = new DbConnection();
        $DBH = $obj->dbConnect();

        $sql = "INSERT INTO `attendence_details`(`master_id`,`std_id`, `attened`) VALUES (?,?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1, $mstrId);
        $conn->bindParam(2, $stdId);
        $conn->bindParam(3, $attend);

        $conn->execute();
    }

    public function last_id_of_atnd_master()
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT id FROM `attendence_master`  ORDER by id DESC LIMIT 1 ";

        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function atndMstrByTcr($tcr_id)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT attendence_master.id,attendence_master.date,teachers.name,subject.subject_name,batch.batch_name,session.session_name,department.dpt_name,attendence_master.total_attendence,attendence_master.total_absence FROM attendence_master,teachers,subject,batch,session,department WHERE attendence_master.tcr_id=teachers.id AND attendence_master.subject_id=subject.id AND attendence_master.batch_id=batch.id AND attendence_master.session_id=session.id AND attendence_master.dpt_id=department.id
and attendence_master.tcr_id = '$tcr_id'";

        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function atndMstrBy()
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT attendence_master.id,attendence_master.date,teachers.name,subject.subject_name,batch.batch_name,session.session_name,department.dpt_name,attendence_master.total_attendence,attendence_master.total_absence FROM attendence_master,teachers,subject,batch,session,department WHERE attendence_master.tcr_id=teachers.id AND attendence_master.subject_id=subject.id AND attendence_master.batch_id=batch.id AND attendence_master.session_id=session.id AND attendence_master.dpt_id=department.id";

        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function atndDetailById($id)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT attendence_details.id,attendence_details.master_id,attendence_details.date,CASE WHEN attendence_details.attened='1' THEN 'Present' ELSE 'Absent' END as attend,students_details.name FROM attendence_details,students_details WHERE attendence_details.master_id='$id' AND attendence_details.std_id=students_details.id";

        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateAttendence($attendance, $master_id,$std_id){
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $sql = "UPDATE `attendence_details` SET `attened`='$attendance' WHERE `master_id`='$master_id' AND `id`='$std_id'";

        //var_dump($sql);
        //die();
        $connect = $conn->prepare($sql);
        $connect->execute();

    }

}