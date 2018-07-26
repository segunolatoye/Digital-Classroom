<?php

include_once "Dbconnection.php";

class students
{

    public  function all_std_master(){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT students_master.id,department.dpt_name,session.session_name,batch.batch_name FROM department,session,batch,students_master WHERE students_master.department_id=department.id AND students_master.session_id=session.id AND students_master.batch_id=batch.id";

        $statement=$conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public  function stdDtailsByMasterId($id){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT a.id,a.std_master_id,a.name,a.student_id,a.email,a.pass,b.session_name,c.dpt_name,d.batch_name,a.photo FROM `students_details` a,session b,department c,batch d WHERE `std_master_id` = '$id' AND a.session_id=b.id AND a.dpt_id = c.id AND a.batch_id=d.id";

        $statement=$conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public  function updateStdInfo($data){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "UPDATE `students_details` SET `name`=?,`student_id`=?,`email`=?,`pass`=?,`session_id`=?,`dpt_id`=?,`batch_id`=? WHERE `id` =?";

        $statement=$conn->prepare($query);
        $statement->bindParam(1,$data['u_name']);
        $statement->bindParam(2,$data['std_id']);
        $statement->bindParam(3,$data['email']);
        $statement->bindParam(4,$data['pass']);
        $statement->bindParam(5,$data['session']);
        $statement->bindParam(6,$data['department']);
        $statement->bindParam(7,$data['batch']);
        $statement->bindParam(8,$data['id']);
        $statement->execute();
    }

    public  function delStudent($data){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "DELETE FROM `students_details` WHERE id = ?";

        $statement=$conn->prepare($query);
        $statement->bindParam(1,$data['del_id']);
        $statement->execute();
    }

    public  function delStdByMaster($data){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "DELETE FROM `students_details` WHERE std_master_id = ?";

        $statement=$conn->prepare($query);
        $statement->bindParam(1,$data['del_master_id']);
        $statement->execute();
    }

    public  function delMaster($data){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "DELETE FROM `students_master` WHERE `id` = ?";

        $statement=$conn->prepare($query);
        $statement->bindParam(1,$data['del_master_id']);
        $statement->execute();
    }

    public function shwStd(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `students_details` WHERE `dpt_id`=1 ";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }
    //    all from student by id
    public function getAllById($id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT a.`id`, a.`std_master_id`, a.`name`, a.`student_id`, a.`email`,a.`session_id`,b.session_name,a.`dpt_id`, c.dpt_name,
 a.`batch_id`,d.batch_name, a.`photo`, a.`status` FROM `students_details` a,session b, department c,batch d WHERE a.`session_id`=b.id
  AND a.`dpt_id`=c.id AND a.`batch_id`=d.id AND a.status=0 AND a.id=?";
        $prepared=$conn->prepare($sql);
        $prepared->bindParam(1,$id);
        $prepared->execute();
        $result=$prepared->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
//    update name and image by id
    public function updateTeacherProfile($name,$image,$id){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="UPDATE `students_details` SET `name`=?,`photo`=? WHERE id=?";
        $prepare=$conn->prepare($sql);
        $prepare->bindParam(1,$name);
        $prepare->bindParam(2,$image);
        $prepare->bindParam(3,$id);
        $prepare->execute();
    }

    public  function stdByBatch($session_id,$dpt_id,$bat_id){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $query = "SELECT `id`, `std_master_id`, `name`, `student_id`, `email`, `pass`, `session_id`, `dpt_id`, `batch_id`, `photo`, CASE WHEN status=0 THEN 'Active' ELSE 'Inactive' END as status FROM `students_details` WHERE `session_id`= ? AND `dpt_id`= ? AND `batch_id`= ?";

        $statement=$conn->prepare($query);
        $statement->bindParam(1,$session_id);
        $statement->bindParam(2,$dpt_id);
        $statement->bindParam(3,$bat_id);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function updateStudent($student_id,$session_id,$dpt_id,$batch_id){
        $db = new DbConnection();
        $conn=$db->dbConnect();

        $sql = "UPDATE `students_details` SET `status`=1 WHERE `student_id`='$student_id' AND `session_id`='$session_id' AND `dpt_id`='$dpt_id' AND `batch_id`='$batch_id'";
        $connection=$conn->prepare($sql);
        $connection->execute();
    }
    //    count all student
    public function numberOfStudent(){
        $obj=new DbConnection();
        $conn=$obj->dbConnect();

        $sql="SELECT COUNT(id) as numberOfStudent FROM `students_details` WHERE status=0";
        $prepare=$conn->prepare($sql);
        $prepare->execute();
        $result=$prepare->fetch(PDO::FETCH_COLUMN);
        return $result;
    }

}