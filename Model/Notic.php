<?php
include_once "Dbconnection.php";

class Notic{

    public function storeNotic($post){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "INSERT INTO `notice`(`title`, `notice`, `as_Dpt_id`, `as_Batch_id`, `as_Session_id`, `as_Subject_id`) VALUES (?,?,?,?,?,?)";
        $conn = $DBH->prepare($sql);
        $conn->bindParam(1,$post['title']);
        $conn->bindParam(2,$post['notic']);
        $conn->bindParam(3,$post['dpt_id']);
        $conn->bindParam(4,$post['batch_id']);
        $conn->bindParam(5,$post['session_id']);
        $conn->bindParam(6,$post['subject_id']);
        $conn->execute();

    }

    public function showNotic($batch_id){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `notice` WHERE `as_Batch_id`= '$batch_id' ORDER BY id DESC";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all =$conn->fetchAll(PDO::FETCH_OBJ);
        return $all ;
    }
    public function showNotice(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `notice` order by id DESC";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all =$conn->fetchAll(PDO::FETCH_OBJ);
        return $all ;
    }

    public function showNoticTeacher($teacher_id){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `notice` WHERE `teachers_id`='$teacher_id' ORDER BY id DESC";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all =$conn->fetchAll(PDO::FETCH_OBJ);
        return $all ;
    }

    public function showBatch(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `batch`";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }

    public function showDpt(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `department`";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }

    public function showSession(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `session`";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }

    public function showallnotice(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `notice` ORDER BY id DESC";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);
        return $all;
    }

    public function showSubject(){
        $obj=new DbConnection();
        $DBH=$obj->dbConnect();

        $sql = "SELECT * FROM `subject`";
        $conn = $DBH->prepare($sql);
        $conn->execute();
        $all = $conn->fetchAll(PDO::FETCH_OBJ);

        return $all;
    }

    function get_time_ago($timestamp)
    {
        date_default_timezone_set('Asia/Dhaka');
        $time_ago = strtotime($timestamp);
        $current_time = time();
        $time_difference = $current_time - $time_ago;
        $seconds = $time_difference;
        $minutes      = round($seconds / 60 );           // value 60 is seconds
        $hours           = round($seconds / 3600);           //value 3600 is 60 minutes * 60 sec
        $days          = round($seconds / 86400);          //86400 = 24 * 60 * 60;
        $weeks          = round($seconds / 604800);          // 7*24*60*60;
        $months          = round($seconds / 2629440);     //((365+365+365+365+366)/5/12)*24*60*60
        $years          = round($seconds / 31553280);     //(365+365+365+365+366)/5 * 24 * 60 * 60
        if($seconds <= 60)
        {
            return "Just Now";
        }
        else if($minutes <=60)
        {
            if($minutes==1)
            {
                return "one minute ago";
            }
            else
            {
                return "$minutes minutes ago";
            }
        }
        else if($hours <=24)
        {
            if($hours==1)
            {
                return "an hour ago";
            }
            else
            {
                return "$hours hrs ago";
            }
        }
        else if($days <= 7)
        {
            if($days==1)
            {
                return "yesterday";
            }
            else
            {
                return "$days days ago";
            }
        }
        else if($weeks <= 4.3) //4.3 == 52/12
        {
            if($weeks==1)
            {
                return "a week ago";
            }
            else
            {
                return "$weeks weeks ago";
            }
        }
        else if($months <=12)
        {
            if($months==1)
            {
                return "a month ago";
            }
            else
            {
                return "$months months ago";
            }
        }
        else
        {
            if($years==1)
            {
                return "one year ago";
            }
            else
            {
                return "$years years ago";
            }
        }
    }


}