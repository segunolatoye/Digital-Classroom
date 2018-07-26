<?php

include_once "Dbconnection.php";

class result
{

    public function totalClass($from, $to)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT COUNT(id) as day,timestampdiff(Day, '$from', '$to'+ INTERVAL 1 DAY ) as daydiff FROM `attendence_master` WHERE date BETWEEN '$from' AND '$to' + INTERVAL 1 DAY ";

        $statement = $conn->prepare($query);
        $statement->execute();
        $rs = $statement->fetch(PDO::FETCH_OBJ);
        return $rs;
    }

    public function totalPresent($from, $to, $stdID)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT COUNT(id) as present FROM `attendence_details` WHERE `std_id`='$stdID' AND date BETWEEN '$from' AND '$to'+ INTERVAL 1 DAY and attened='1'";

        $statement = $conn->prepare($query);
        $statement->execute();
        $rs = $statement->fetch(PDO::FETCH_OBJ);
        return $rs->present;
    }

    public function storeRsltMastr($post)
    {
        $obj = new DbConnection();
        $DBH = $obj->dbConnect();

        $sql = "INSERT INTO `result_master`(`tcr_id`, `sub_id`, `session_id`, `batch_id`, `dpt_id`) VALUES (?,?,?,?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1, $post['tcr_id']);
        $conn->bindParam(2, $post['sub_id']);
        $conn->bindParam(3, $post['session_id']);
        $conn->bindParam(4, $post['batch_id']);
        $conn->bindParam(5, $post['dpt_id']);

        $conn->execute();
    }


    public function last_id_of_rslt_master()
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT id FROM `result_master`  ORDER by id DESC LIMIT 1 ";

        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public function storeRsltDetails($mastrId, $nam, $stdID,$ctMrk,$assMrk, $midMrk, $finlMrk, $atnd_mrk)
    {
        $obj = new DbConnection();
        $DBH = $obj->dbConnect();

        $sql = "INSERT INTO `result_details`(`master_id`, `name`, `std_id`,`ct_mrk`,`ass_mrk`, `mid_mrk`, `final_mrk`, `atnd_mrk`) VALUES (?,?,?,?,?,?,?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1, $mastrId);
        $conn->bindParam(2, $nam);
        $conn->bindParam(3, $stdID);
        $conn->bindParam(4, $ctMrk);
        $conn->bindParam(5, $assMrk);
        $conn->bindParam(6, $midMrk);
        $conn->bindParam(7, $finlMrk);
        $conn->bindParam(8, $atnd_mrk);
        $conn->execute();
    }

    public function showReslutByTcr($tcr_id)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT result_master.id,result_master.tcr_id,subject.subject_name,session.session_name,batch.batch_name,department.dpt_name,CASE WHEN result_master.status=\"0\" THEN 'Unpublished' ELSE 'Published' END as status FROM `result_master`,subject,session,batch,department WHERE result_master.sub_id=subject.id AND result_master.session_id=session.id AND result_master.batch_id=batch.id AND result_master.dpt_id=department.id AND result_master.tcr_id='$tcr_id'";

        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }

    public function pubRslt($pub_id)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "UPDATE `result_master` SET `status`='1' WHERE `id`= '$pub_id'";

        $statement = $conn->prepare($query);
        $statement->execute();
    }

    public function unpubRslt($unpub_id)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "UPDATE `result_master` SET `status`='0' WHERE `id`= '$unpub_id'";

        $statement = $conn->prepare($query);
        $statement->execute();
    }

    public function delRslt($rs_id)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "DELETE FROM `result_master` WHERE `id`= '$rs_id'";
        $statement = $conn->prepare($query);
        $statement->execute();

        $sql = "DELETE FROM `result_details` WHERE `master_id`='$rs_id'";
        $statement = $conn->prepare($sql);
        $statement->execute();
    }

    public function rsltDetailByID($mster_id)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT * FROM `result_details` WHERE `master_id`='$mster_id'";
        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
    public function updateMark($data)
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "UPDATE `result_details` SET `ct_mrk`=?,`ass_mrk`=?,`mid_mrk`=?,`final_mrk`=? WHERE id= ?";
        $statement = $conn->prepare($query);
        $statement->bindParam(1,$data['ct_mrk']);
        $statement->bindParam(2,$data['ass_mrk']);
        $statement->bindParam(3,$data['mid_mark']);
        $statement->bindParam(4,$data['fnl_mrk']);
        $statement->bindParam(5,$data['id']);
        $statement->execute();
    }


    //student can see result
    public function showReslutByTcrpublush()
    {
        $db = new DbConnection();
        $conn = $db->dbConnect();

        $query = "SELECT result_master.id,result_master.tcr_id,subject.subject_name,session.session_name,batch.batch_name,department.dpt_name FROM `result_master`,subject,session,batch,department WHERE result_master.sub_id=subject.id AND result_master.session_id=session.id AND result_master.batch_id=batch.id AND result_master.dpt_id=department.id AND result_master.status=1";

        $statement = $conn->prepare($query);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_OBJ);
    }
}